# 

1. criar arquivo database.sqlite no diretorio /database
2. executar comando
   ``` php artisan migrate #gera as tabelas ```
   
   
```docker
FROM nexus-imagens.pbh.gov.br/prodabel/debian-stretch-slim_apache-2.4_php7.2_oracle_mssqlserver AS builder

USER root

WORKDIR /var/www/html

# instala extensoes php (cli)
RUN apt-get -qq update -y
RUN apt-get install -y unzip php7.2-soap php7.2-zip && \
    echo 'extension=oci8.so' >> /etc/php/7.2/cli/php.ini && \
    echo 'extension=pdo_oci.so' >> /etc/php/7.2/cli/php.ini && \
    echo 'extension=sqlsrv.so' >> /etc/php/7.2/cli/conf.d/20-sqlsrv.ini && \
    echo 'extension=pdo_sqlsrv.so' >> /etc/php/7.2/cli/conf.d/30-pdo_sqlsrv.ini

# instala composer
RUN cd ~ && \
    curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# instala dependencias do composer e node e configura laravel
ENTRYPOINT ["bash", "-c", "composer install && mv .env.example .env && \
    php artisan key:generate &&  \
    chmod -R 755 . && chmod -R 777 storage bootstrap/cache && chown -R www-data:www-data . "]
```

```docker
FROM nexus-imagens.pbh.gov.br/prodabel/debian-stretch-slim_apache-2.4_php7.2_oracle_mssqlserver AS publisher

# instala extensoes laravel
RUN apt-get -qq update -y
RUN apt-get install -y unzip php7.2-soap php7.2-zip

# configura apache para o laravel
RUN sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#' /etc/apache2/sites-available/000-default.conf && \
    sed -i 's#<Directory /var/www/html>#<Directory /var/www/html/public>#' /etc/apache2/sites-available/000-default.conf && \
    sed -i 's#AllowOverride None#AllowOverride All#' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

COPY . .

CMD ["service", "apache2", "start"]
```
