<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaRead
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaRead\Repository;

use MongoDB\Collection\CollectionInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ToppingRepositoryFactory
 *
 * @package PizzaRead
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
        /** @var $toppingCollection CollectionInterface */
        $toppingCollection = $serviceLocator->get(
            'PizzaRead\Collection\Topping'
        );

        $repository = new ToppingRepository();
        $repository->setToppingCollection($toppingCollection);

        return $repository;
    }

} 