<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaView
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * PizzaView module configuration
 *
 * @package    PizzaView
 */
return array(
    'router'          => array(
        'routes' => array(
            'pizza-view' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/pizza/view[/:id]',
                    'defaults'    => array(
                        'controller' => 'pizza-view',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]*',
                    ),
                ),
            ),
            'topping-view' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/topping/view[/:id]',
                    'defaults'    => array(
                        'controller' => 'topping-view',
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
            'pizza-view'   => 'PizzaView\Controller\PizzaControllerFactory',
            'topping-view' => 'PizzaView\Controller\ToppingControllerFactory',
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            'PizzaView\Collection\Pizza'   => 'PizzaView\Collection\PizzaCollectionFactory',
            'PizzaView\Collection\Topping' => 'PizzaView\Collection\ToppingCollectionFactory',
            'PizzaView\Repository\Pizza'   => 'PizzaView\Repository\PizzaRepositoryFactory',
        ),
    ),

    'view_manager'    => array(
        'strategies' => array('ViewJsonStrategy'),
    ),
);
