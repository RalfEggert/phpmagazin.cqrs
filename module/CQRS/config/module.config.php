<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    CQRS
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * CQRS module configuration
 *
 * @package    CQRS
 */
return array(
    'service_manager' => array(
        'factories' => array(
            'CQRS\Event\Handler'   => 'CQRS\Event\EventHandlerFactory',
            'CQRS\Command\Handler' => 'CQRS\Command\CommandHandlerFactory',
        ),
    ),
);
