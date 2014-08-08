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
namespace PizzaRead\Collection;

use MongoDB;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Topping collection factory
 *
 * Factory to create the collection for toppings
 *
 * @package    PizzaRead
 */
class ToppingCollectionFactory implements FactoryInterface
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
        /** @var $adapter MongoDB */
        $adapter = $serviceLocator->get('MongoDb\Db\Adapter');

        $collection = new ToppingCollection($adapter);

        return $collection;
    }
}
