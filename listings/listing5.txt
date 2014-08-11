<?php
namespace PizzaRead\Collection;

use MongoDB;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PizzaCollectionFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var $adapter MongoDB */
        $adapter = $serviceLocator->get('MongoDb\Db\Adapter');

        $collection = new PizzaCollection($adapter);

        return $collection;
    }
}

