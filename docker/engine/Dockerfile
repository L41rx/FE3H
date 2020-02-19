FROM php:7.3-fpm

MAINTAINER June <junipermcintyre@gmail.com>

USER root

ENV APPLICATION_ENV='docker'

RUN mkdir -p /usr/share/man/man1

RUN apt-get update

RUN apt-get install -y \
        git \
        wget \
        nano \
        sudo \
        software-properties-common

RUN usermod -u 1000 www-data
