FROM php:7.2-alpine

LABEL maintainer="ipunkt Business Solutions <info@ipunkt.biz>" \
		version.image="v3.0" \
		version.php=$PHP_VERSION \
		description="A supervisor configured to run with laravel artisan queue:work or artisan horizon command"

ENV QUEUE_CONNECTION=database
ENV QUEUE_NAME=default
ENV LARAVEL_HORIZON=false

RUN echo "ipv6" >> /etc/modules

# Install pdo if you want to use database queue
RUN docker-php-ext-install pdo pdo_mysql pcntl posix

# Install supervisor
RUN apk add --update \
    python \
    python-dev \
    py-pip \
    build-base \
  && pip install virtualenv \
  && rm -rf /var/cache/apk/*
RUN pip install supervisor

# Define working directory
WORKDIR /etc/supervisor/conf.d

# Use local configuration
ADD conf.d/worker.conf /etc/supervisor/conf.d/worker.conf

# Add bash console
RUN apk add --no-cache bash

# Copy scripts
ADD init.sh /usr/local/bin/init.sh

# Run supervisor
ENTRYPOINT ["/bin/sh", "/usr/local/bin/init.sh"]