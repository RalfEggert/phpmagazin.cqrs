<?php
namespace MongoDB\Db;

use MongoClient;
use MongoDB;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdapterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        $databaseName = $config['mongodb']['database'];

        $client = new MongoClient();

        $database = $client->$databaseName;

        return $database;
    }
}

