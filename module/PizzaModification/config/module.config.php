<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaModification
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * PizzaModification module configuration
 *
 * @package    PizzaModification
 */
return array(
    'service_manager' => array(
        'factories' => array(
            'PizzaModification\Repository\Pizza' => 'PizzaModification\Repository\PizzaRepositoryFactory',
            'PizzaModification\Table\Pizza'      => 'PizzaModification\Table\PizzaTableFactory',
            'PizzaModification\Table\Topping'    => 'PizzaModification\Table\ToppingTableFactory',
        ),
    ),
);
