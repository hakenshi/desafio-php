FROM php:8.2-apache

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Habilitar o módulo rewrite do Apache
RUN a2enmod rewrite

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos da aplicação e o diretório vendor
COPY . /var/www/html/

# Ajustar permissões para evitar problemas de acesso
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expor a porta padrão do Apache
EXPOSE 80

# Iniciar o Apache
CMD ["apache2-foreground"]
