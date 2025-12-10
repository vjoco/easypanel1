# Start from a base image that already has PHP installed
FROM php:8.2-fpm-alpine

# Copy your application files into the web root
COPY . /var/www/html/

# Expose the port your PHP server will listen on
EXPOSE 8111

# The command to start the built-in PHP development server
CMD ["php", "-S", "0.0.0.0:8111", "-t", "/var/www/html/"]

