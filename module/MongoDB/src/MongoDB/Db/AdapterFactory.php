<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    MongoDB
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * MongoDB module configuration
 *
 * @package    MongoDB
 */
namespace MongoDB\Db;

use MongoClient;
use MongoDB;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * MongoDb Adapter factory
 *
 * Factory to create the db adapter to the MongoDb client
 *
 * @package    MongoDB
 */
class AdapterFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return MongoDB
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // get configuration data
        $config = $serviceLocator->get('config');

        // get database name
        $databaseName = $config['mongodb']['database'];

        // connect
        $client = new MongoClient();

        // select a database
        $database = $client->$databaseName;

        // return adapter
        return $database;
    }
}
