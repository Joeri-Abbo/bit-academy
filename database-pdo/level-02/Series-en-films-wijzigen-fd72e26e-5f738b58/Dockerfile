FROM php:latest
RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html

WORKDIR /var/www/html

CMD ["php", "-S", "0.0.0.0:80"]
