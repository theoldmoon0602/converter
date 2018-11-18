FROM php:7.2-apache

RUN apt update -y && apt install -y imagemagick
ADD gm /var/tmp/gm
WORKDIR /var/tmp/gm
RUN /var/tmp/gm/configure && make && make install
WORKDIR /var/www/html
ADD html /var/www/html/
RUN mkdir /var/www/html/sandbox && chown www-data /var/www/html/sandbox
RUN chown root:www-data /var/www/html/index.php /var/www/html/convert.php
RUN chmod 0750 /var/www/html/index.php /var/www/html/convert.php
RUN chmod 0760 /var/www/html/defenseflag.txt
