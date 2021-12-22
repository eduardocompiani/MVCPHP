## PHP + PostgreSQL + PGAdmin4 + Composer
A complete template for small projects

## Running the project
To run this project you only need to run `docker-compose up`

## Using PGAdmin
* PGAdmin URL: [localhost:8080](http://localhost:8080)
* PGAdmin User: root@root.com
* PGAdmin Password: root
* PostgreSQL Server: pgsql
* PostgreSQL User: root
* PostgreSQL Password: root

## Useful Commands

1. Installing dependencies with composer:

    ``docker-compose run php composer install``

2. Running dump-autoload:

   ``docker-compose run php composer dump-autoload``

3. Running unit tests:

   ``docker-compose run php "./vendor/bin/phpunit"``