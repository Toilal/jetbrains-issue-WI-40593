FROM php:7.1-cli

# Register the COMPOSER_HOME environment variable
ENV COMPOSER_HOME /composer

# Add global binary directory to PATH and make sure to re-export it
ENV PATH /composer/vendor/bin:$PATH

# Allow Composer to be run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Setup the Composer installer
RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
  && curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
  && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }"

# Install Composer
RUN php /tmp/composer-setup.php --no-ansi --install-dir=/usr/local/bin --filename=composer --snapshot && rm -rf /tmp/composer-setup.php
RUN apt-get update && apt-get install -y git zip unzip

# Install prestissimo
RUN composer global require hirak/prestissimo

# Fix permissions to match host user
RUN usermod -u ${HOST_UID:-1000} www-data && groupmod -g ${HOST_GID:-1000} www-data
RUN chown -R www-data:www-data $COMPOSER_HOME

# Add composer cache to a volume
RUN mkdir -p /composer/cache && chown -R www-data:www-data /composer/cache
VOLUME /composer/cache
