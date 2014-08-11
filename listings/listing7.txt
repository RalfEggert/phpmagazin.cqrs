<?php
namespace PizzaRead\Repository;

use MongoDB\Collection\CollectionInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PizzaRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var $pizzaCollection CollectionInterface */
        $pizzaCollection = $serviceLocator->get('PizzaRead\Collection\Pizza');

        $repository = new PizzaRepository();
        $repository->setPizzaCollection($pizzaCollection);

        return $repository;
    }
} 
