# syntax=docker/dockerfile:1.5.1

# php.docker/Dockerfile

ARG PHP_DOCKER_IMAGE_VERSION
FROM php:8.5.0RC4-apache-trixie

RUN a2enmod rewrite
RUN pecl install xdebug-3.5.0 && docker-php-ext-enable xdebug
COPY xdebug-tune.ini /usr/local/etc/php/conf.d/

