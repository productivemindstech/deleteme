#
# PHP image based on official image
#
FROM php:7.0.14-fpm
MAINTAINER Proper Media <staff@proper.io>

# add msmtp config file
ADD msmtprc /etc/msmtprc

RUN printf "deb http://archive.debian.org/debian/ jessie main\ndeb-src http://archive.debian.org/debian/ jessie main\ndeb http://security.debian.org jessie/updates main\ndeb-src http://security.debian.org jessie/updates main" > /etc/apt/sources.list

# install mysql extension in php
RUN apt-get update && \
	DEBIAN_FRONTEND=noninteractive apt-get -y install \
        ca-certificates \
        msmtp \
        libpq-dev \
        libxml2-dev \
		libmcrypt-dev \
		libmagickwand-dev --no-install-recommends \
		git && \
    pecl channel-update pecl.php.net && \
    pecl install imagick && \
    rm -r /var/lib/apt/lists/* && \
 	docker-php-ext-enable imagick && \
    docker-php-ext-configure mysqli --with-mysqli=mysqlnd && \
    docker-php-ext-install mysqli \
        pdo \
        pdo_mysql \
        mcrypt && \
	apt-get update && \
	DEBIAN_FRONTEND=noninteractive apt-get -y install ca-certificates msmtp && \
	chmod 0644 /etc/msmtprc


# turn on file uploads, increase max size,
# & use msmtp for sending email
ADD uploads.ini /usr/local/etc/php/conf.d/
ADD email.ini /usr/local/etc/php/conf.d/


RUN pecl install xdebug \
    && docker-php-ext-enable xdebug


ADD xdebug.ini /usr/local/etc/php/conf.d/
