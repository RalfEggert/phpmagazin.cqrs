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
 * Local configuration
 *
 * @package     Application
 */
return array(
    'db' => array(
        'driver'  => 'Pdo',
        'dsn'     => 'mysql:dbname=phpmagazin-cqrs;host=localhost;charset=utf8',
        'user'    => 'cqrs',
        'pass'    => 'cqrs',
    ),
    'mongodb' => array(
        'database' => 'pizzadb',
    ),
);
