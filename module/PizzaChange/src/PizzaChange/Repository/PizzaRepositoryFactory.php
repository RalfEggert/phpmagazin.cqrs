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
namespace PizzaChange\Repository;

use PizzaChange\Table\PizzaTableInterface;
use PizzaChange\Table\ToppingTableInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PizzaRepositoryFactory
 *
 * @package PizzaChange
 */
class PizzaRepositoryFactory implements FactoryInterface
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
        /** @var $pizzaTable PizzaTableInterface */
        $pizzaTable = $serviceLocator->get('PizzaChange\Table\Pizza');

        /** @var $toppingTable ToppingTableInterface */
        $toppingTable = $serviceLocator->get('PizzaChange\Table\Topping');

        /** @var $pizzaToppingsTable ToppingTableInterface */
        $pizzaToppingsTable = $serviceLocator->get(
            'PizzaChange\Table\PizzaToppings'
        );

        $repository = new PizzaRepository();
        $repository->setPizzaTable($pizzaTable);
        $repository->setToppingTable($toppingTable);
        $repository->setPizzaToppingsTable($pizzaToppingsTable);

        return $repository;
    }

} 