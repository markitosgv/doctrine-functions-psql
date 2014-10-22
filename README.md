Doctrine Functions for PostgreSQL
=================================

This package contains doctrine functions for PostgreSQL.

List of available functions:

* `DAYOFWEEK(expr)`
* `WEEK(expr)`
* `DAYOFMONTH(expr)`
* `DAYOFYEAR(expr)`
* `HOUR(expr)`
* `MINUTE(expr)`
* `MONTH(expr)`
* `QUARTER(expr)`
* `SECOND(expr)`
* `YEAR(expr)`

Edit this file in your pull request to add your functions to the list.

## Install

Via Composer

``` bash
$ composer require gesdinet/doctrine-functions-psql
```

## Usage

### 1) Doctrine Only

According to the [Doctrine documentation](http://docs.doctrine-project.org/en/2.0.x/cookbook/dql-user-defined-functions.html "Doctrine documentation") you can register the functions in this package this way.

```php
<?php
$config = new \Doctrine\ORM\Configuration();
$config->addCustomDatetimeFunction('year', 'Gesdinet\DQL\Datetime\Year');

$em = EntityManager::create($dbParams, $config);
```

### 2) Using Symfony 2

With Symfony 2 you can register your functions directly in the `config.yml` file.

```yaml
doctrine:
    orm:
        dql:
            datetime_functions:
                month:     Gesdinet\DQL\Datetime\Month
                year:      Gesdinet\DQL\Datetime\Year
                # etc
```

## Contributing

Feel free to make a PR with new functions and tests

## Credits

- [markitosgv](https://github.com/markitosgv)
- [gesdinet](https://github.com/gesdinet)
- [All Contributors](https://github.com/gesdinet/doctrine-functions-psql/graphs/contributors)

Based on luxifer doctrine-functions for MySQL

- [luxifer](https://github.com/luxifer/doctrine-functions)

## License

The MIT License (MIT). Please see [License File](https://github.com/gesdinet/doctrine-functions-psql/blob/master/LICENSE) for more information.