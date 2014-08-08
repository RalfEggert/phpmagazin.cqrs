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

use PizzaChange\Table\ToppingTableInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ToppingRepositoryFactory
 *
 * @package PizzaChange
 */
class ToppingRepositoryFactory implements FactoryInterface
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
        /** @var $toppingTable ToppingTableInterface */
        $toppingTable = $serviceLocator->get('PizzaChange\Table\Topping');

        $repository = new ToppingRepository();
        $repository->setToppingTable($toppingTable);

        return $repository;
    }

} 