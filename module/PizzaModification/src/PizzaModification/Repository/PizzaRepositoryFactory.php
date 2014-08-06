<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaModification
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaModification\Repository;

use PizzaModification\Table\PizzaTableInterface;
use PizzaModification\Table\ToppingTableInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PizzaRepositoryFactory
 *
 * @package PizzaModification\Repository
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
        /* @var $pizzaTable PizzaTableInterface */
        $pizzaTable = $serviceLocator->get('PizzaModification\Table\Pizza');

        /* @var $toppingTable ToppingTableInterface */
        $toppingTable = $serviceLocator->get('PizzaModification\Table\Topping');

        $repository = new PizzaRepository();
        $repository->setPizzaTable($pizzaTable);
        $repository->setToppingTable($toppingTable);

        return $repository;
    }

} 