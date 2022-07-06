FROM php:7.3-apache

# put files
WORKDIR /var/www/html/
COPY ./src .

# config permission
RUN chown -R root:www-data /var/www/html
RUN chmod 750 /var/www/html
RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;

# add sticky bit to prevent delete files
RUN chmod +t -R /var/www/html/
RUN apt-get update -y

# setup flag
RUN echo '😲 This is flag: b38e625204bd8d09089d3eacc3a9c862 😱' > /flag_file
