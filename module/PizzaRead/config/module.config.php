<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaRead
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * PizzaRead module configuration
 *
 * @package    PizzaRead
 */
return array(
    'router'          => array(
        'routes' => array(
            'pizza-read'   => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/pizza/read[/:id]',
                    'defaults'    => array(
                        'controller' => 'pizza-read',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]*',
                    ),
                ),
            ),
            'topping-read' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/topping/read[/:id]',
                    'defaults'    => array(
                        'controller' => 'topping-read',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]*',
                    ),
                ),
            ),
        ),
    ),

    'controllers'     => array(
        'factories' => array(
            'pizza-read'   => 'PizzaRead\Controller\PizzaControllerFactory',
            'topping-read' => 'PizzaRead\Controller\ToppingControllerFactory',
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            'PizzaRead\Collection\Pizza'   => 'PizzaRead\Collection\PizzaCollectionFactory',
            'PizzaRead\Collection\Topping' => 'PizzaRead\Collection\ToppingCollectionFactory',
            'PizzaRead\Repository\Pizza'   => 'PizzaRead\Repository\PizzaRepositoryFactory',
            'PizzaRead\Repository\Topping' => 'PizzaRead\Repository\ToppingRepositoryFactory',
        ),
    ),
);
