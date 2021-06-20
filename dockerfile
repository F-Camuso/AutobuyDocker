FROM php:8.0.7-apache
COPY Autobuy-master/ /var/www/html/
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
EXPOSE 80