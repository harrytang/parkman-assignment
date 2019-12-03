# ParkMan Assignment

This application is build using [Yii 2](http://www.yiiframework.com/).


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      web/                contains the entry script and Web resources

REQUIREMENTS
------------

The minimum requirement by this application that your Web server supports PHP 7.1


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this application using the following command:

~~~
composer update --prefer-dist
~~~

Edit the file `config/db.php` with real data, for example:
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Then run `migration` for database schema creation
```
php yii migrate
```

Now you should be able to access the application through the following URL, assuming `web` is the directory
directly under the Web root.

~~~
http://localhost/web/garages
~~~

### Install with Docker

Run docker-compose

    docker-compose up -d

Then, install your vendor packages

    docker-compose run api composer update --prefer-dist    
    
Run `migration` for database schema creation

     docker-compose run api php yii migrate   
    
You can then access the application through the following URL:

    http://127.0.0.1:8000/garages

**NOTES:** 
- Required Docker engine version `19.03` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))

Usage
-----
List all garages
```
GET /garages
```
Search garages by name
```
GET /garages/search?name=tampere
```
Search garages by county name
```
GET /garages/search?country=finland
```
Search garages by location (Latitude and Longitude). You do not need to type the full latitude/longitude, just use the
format `xx.xxx xx.xxx` is OK.
```
GET /garages/search?point=60.168 24.932
```
You can also search by multiple criteria
```
GET /garages/search?name=tampere&country=fin
```