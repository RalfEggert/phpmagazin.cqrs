<?php
namespace PizzaChange\Table;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PizzaTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var $adapter AdapterInterface */
        $adapter   = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $resultSet = new ResultSet(ResultSet::TYPE_ARRAY);

        $table = new PizzaTable($adapter, $resultSet);

        return $table;
    }
} 
