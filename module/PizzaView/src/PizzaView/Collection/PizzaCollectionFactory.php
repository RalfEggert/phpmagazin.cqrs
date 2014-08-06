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
namespace PizzaView\Collection;

use MongoDB;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Pizza collection factory
 *
 * Factory to create the collection for pizzas
 *
 * @package    PizzaView
 */
class PizzaCollectionFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return PizzaCollection
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $adapter MongoDB */
        $adapter = $serviceLocator->get('MongoDb\Db\Adapter');

        $collection = new PizzaCollection($adapter);

        return $collection;
    }
}
