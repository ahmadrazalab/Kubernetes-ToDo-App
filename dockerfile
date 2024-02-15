FROM noscopev6/k8-todoapp:1

RUN rm -rf /var/www/html/*

# App Files Copy into the project directory
COPY ./app-files/* /var/www/html/
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for Nginx
EXPOSE 80

# Start Nginx and PHP-FPM
CMD service nginx start && service php8.0-fpm start && tail -f /dev/null


