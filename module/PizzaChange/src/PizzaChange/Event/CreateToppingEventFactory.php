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

use PizzaChange\Repository\ToppingRepositoryInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class CreateToppingEventFactory
 *
 * @package PizzaChange
 */
class CreateToppingEventFactory implements FactoryInterface
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
        /** @var ToppingRepositoryInterface $toppingRepository */
        $toppingRepository = $serviceLocator->get(
            'PizzaChange\Repository\Topping'
        );

        $event = new CreateToppingEvent();
        $event->setToppingRepository($toppingRepository);

        return $event;
    }

} 