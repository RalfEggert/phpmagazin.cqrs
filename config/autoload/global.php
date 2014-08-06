<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * Global configuration
 *
 * @package    Application
 */
return array(
    'db'              => array(
        'driver' => 'Pdo',
        'dsn'    => 'mysql:dbname=secretdatabase;host=dbserver1;charset=utf8',
        'user'   => 'geheim',
        'pass'   => 'geheim',
    ),
    'mongodb'         => array(
        'database' => 'pizzadb',
    ),
    'service_manager' => array(
        'factories' => array(
            'MongoDb\Db\Adapter'      => 'MongoDB\Db\AdapterFactory',
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
);