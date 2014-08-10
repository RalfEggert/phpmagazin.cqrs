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
 * namespace definition and usage
 */
namespace PizzaCli\Queue;

use PizzaCli\Repository\PizzaRepositoryInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class QueueHandlerFactory
 *
 * @package PizzaCli
 */
class QueueHandlerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var PizzaRepositoryInterface $pizzaRepository */
        $pizzaRepository = $serviceLocator->get('PizzaCli\Repository\Pizza');

        $repository = new QueueHandler($pizzaRepository);

        return $repository;
    }

} 