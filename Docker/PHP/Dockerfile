FROM php:7.4-apache-buster
RUN apt-get update \
    && apt-get install -y libicu-dev unixodbc freetds-bin freetds-dev \
                       freetds-common freetds-dev sqsh tdsodbc libct4 libsybdb5 \
                       ssl-cert mariadb-client git tdsodbc libsybdb5 libxml2-dev \
                       re2c bc locales locales-all libpng-dev libldap2-dev \
                       libfreetype6-dev  libjpeg62-turbo-dev libpng-dev libzip-dev \
                       git unzip vim dos2unix zlib1g-dev \
                       git unzip vim dos2unix zlib1g-dev \
    && mkdir -p /usr/share/man/man1 \
    && ln -fs /usr/lib/x86_64-linux-gnu/libldap.so /usr/lib/ \
    && docker-php-ext-configure intl \
    && docker-php-ext-configure pdo_dblib --with-libdir=lib/x86_64-linux-gnu \
    && docker-php-ext-configure gd \
    && docker-php-ext-install pdo_dblib pdo_mysql opcache intl gd ldap bcmath soap zip \
    && a2enmod ssl rewrite \
    && a2ensite default-ssl \
    && mkdir -p /var/lib/php/sessions \
    && chmod 1733 /var/lib/php/sessions

# Install git, unzip
RUN apt-get update \
    && apt-get -y install git unzip vim dos2unix

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer