<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaCli
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * PizzaCli module configuration
 *
 * @package    PizzaCli
 */
return array(
    'console'         => array(
        'router' => array(
            'routes' => array(
                'process-queue' => array(
                    'options' => array(
                        'route'    => 'process queue',
                        'defaults' => array(
                            'controller' => 'pizza-cli',
                            'action'     => 'process-queue'
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers'     => array(
        'factories' => array(
            'pizza-cli' => 'PizzaCli\Controller\PizzaControllerFactory',
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            'PizzaCli\Repository\Pizza'   => 'PizzaCli\Repository\PizzaRepositoryFactory',
            'PizzaCli\Queue\Handler'      => 'PizzaCli\Queue\QueueHandlerFactory',
            'PizzaCli\Collection\Pizza'   => 'PizzaCli\Collection\PizzaCollectionFactory',
            'PizzaCli\Collection\Topping' => 'PizzaCli\Collection\ToppingCollectionFactory',
        ),
    ),
);
