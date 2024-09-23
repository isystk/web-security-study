FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    libonig-dev wget \
  && docker-php-ext-install pdo_mysql mysqli

RUN a2enmod include
RUN a2enmod cgid
