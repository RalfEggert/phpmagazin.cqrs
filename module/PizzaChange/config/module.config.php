<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaChange
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * PizzaChange module configuration
 *
 * @package    PizzaChange
 */
return array(
    'router'          => array(
        'routes' => array(
            'pizza-change'   => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/pizza/change[/:id]',
                    'defaults'    => array(
                        'controller' => 'pizza-change',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]*',
                    ),
                ),
            ),
            'topping-change' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/topping/change[/:id]',
                    'defaults'    => array(
                        'controller' => 'topping-change',
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
            'pizza-change'   => 'PizzaChange\Controller\PizzaControllerFactory',
            'topping-change' => 'PizzaChange\Controller\ToppingControllerFactory',
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            'PizzaChange\Repository\Pizza'         => 'PizzaChange\Repository\PizzaRepositoryFactory',
            'PizzaChange\Repository\Topping'       => 'PizzaChange\Repository\ToppingRepositoryFactory',
            'PizzaChange\Table\Pizza'              => 'PizzaChange\Table\PizzaTableFactory',
            'PizzaChange\Table\PizzaToppings'      => 'PizzaChange\Table\PizzaToppingsTableFactory',
            'PizzaChange\Table\Topping'            => 'PizzaChange\Table\ToppingTableFactory',
            'PizzaChange\Event\CreatePizzaEvent'   => 'PizzaChange\Event\CreatePizzaEventFactory',
            'PizzaChange\Event\CreateToppingEvent' => 'PizzaChange\Event\CreateToppingEventFactory',
            'PizzaChange\Event\UpdateToppingEvent' => 'PizzaChange\Event\UpdateToppingEventFactory',
            'PizzaChange\Event\DeleteToppingEvent' => 'PizzaChange\Event\DeleteToppingEventFactory',
        ),
    ),
    'event_handler'   => array(
        'events' => array(
            'PizzaChange\Event\CreatePizzaEvent',
            'PizzaChange\Event\CreateToppingEvent',
            'PizzaChange\Event\UpdateToppingEvent',
            'PizzaChange\Event\DeleteToppingEvent',
        ),
    ),
);
