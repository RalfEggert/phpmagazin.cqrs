<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaView
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaView\Repository;

use PizzaView\Collection\CollectionInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PizzaRepositoryFactory
 *
 * @package PizzaView\Repository
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
        /* @var $pizzaCollection CollectionInterface */
        $pizzaCollection = $serviceLocator->get('PizzaView\Collection\Pizza');

        /* @var $pizzaCollection CollectionInterface */
        $toppingCollection = $serviceLocator->get('PizzaView\Collection\Topping');

        $repository = new PizzaRepository();
        $repository->setPizzaCollection($pizzaCollection);
        $repository->setToppingCollection($toppingCollection);

        return $repository;
    }

} 