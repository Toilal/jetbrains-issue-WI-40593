WI-40593
========

Issue reproduction project for [WI-40593](https://youtrack.jetbrains.com/issue/WI-40593)

Setup
-----

- Composer dependencies must be downloaded with the following command:

```bash
docker-compose run --rm --user www-data --entrypoint composer --workdir=/var/www/html/backend php install
```

- Tests can be run with the following command:

```bash
docker-compose run --rm --user www-data --workdir=/var/www/html/backend php ./vendor/bin/phpunit
```
