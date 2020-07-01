FROM php:7.3-alpine

RUN apk add --update libzip-dev unzip \
    && docker-php-ext-install zip

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN addgroup -g 1001 docker \
 && adduser -D -u 1000 -G docker mitsu

USER mitsu

WORKDIR /src
