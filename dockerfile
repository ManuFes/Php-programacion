# Nota: Siempre que editemos el compose o el dockerfile añadir flag --build al comando de compose

# Dockerfile
# Usamos y configuramos una imagen con PHP 8.3 con Apache
FROM php:8.3-apache

# Instalamos las extensiones necesarias
RUN apt-get update
RUN apt-get install zip unzip
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

# Habilitamos las extensiones
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-enable pdo_mysql

# Sobreescribimos la configuración y reiniciamos el servicio APACHE
RUN a2enmod rewrite

# Configuramos el directorio de trabajo
WORKDIR /var/www/html

# Expone el puerto 80 para apache
EXPOSE 80

# Lanzar apache en backgroun
CMD ["apache2-foreground"]