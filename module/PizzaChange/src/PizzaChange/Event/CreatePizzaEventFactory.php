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
 * namespace definition and usage
 */
namespace PizzaChange\Event;

use PizzaChange\Repository\PizzaRepositoryInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class CreatePizzaEventFactory
 *
 * @package PizzaChange
 */
class CreatePizzaEventFactory implements FactoryInterface
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
        $pizzaRepository = $serviceLocator->get('PizzaChange\Repository\Pizza');

        $event = new CreatePizzaEvent();
        $event->setPizzaRepository($pizzaRepository);

        return $event;
    }

} 