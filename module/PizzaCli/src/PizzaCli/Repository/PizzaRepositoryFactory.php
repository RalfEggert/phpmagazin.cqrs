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
namespace PizzaCli\Repository;

use MongoDB\Collection\CollectionInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PizzaRepositoryFactory
 *
 * @package PizzaCli
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
        /** @var $pizzaCollection CollectionInterface */
        $pizzaCollection = $serviceLocator->get('PizzaCli\Collection\Pizza');

        /** @var $pizzaCollection CollectionInterface */
        $toppingCollection = $serviceLocator->get(
            'PizzaCli\Collection\Topping'
        );

        $repository = new PizzaRepository();
        $repository->setPizzaCollection($pizzaCollection);
        $repository->setToppingCollection($toppingCollection);

        return $repository;
    }

} 