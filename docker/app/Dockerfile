FROM php:7.2-fpm

RUN apt-get update && apt-get install -y unzip \
    git libmcrypt-dev libicu-dev g++ \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev gnupg

RUN curl -sL https://deb.nodesource.com/setup_8.x | bash && apt-get install -y nodejs

RUN docker-php-ext-install intl pdo pdo_mysql gd opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm /etc/localtime && ln -s /usr/share/zoneinfo/Europe/Moscow /etc/localtime

ADD custom.ini /usr/local/etc/php/conf.d

RUN touch $HOME/.profile && curl -o- -L https://yarnpkg.com/install.sh | bash && ln -s /root/.yarn/bin/yarn /usr/bin/yarn

RUN rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/sphinx

