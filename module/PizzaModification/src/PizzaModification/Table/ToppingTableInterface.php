<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaModification
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaModification\Table;

use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGatewayInterface;


/**
 * Class ToppingTable
 *
 * @package PizzaModification
 */
interface ToppingTableInterface extends TableGatewayInterface
{
    /**
     * @param AdapterInterface $adapter
     * @param \Zend\Db\ResultSet\ResultSetInterface $resultSetPrototype
     */
    public function __construct(
        AdapterInterface $adapter, ResultSetInterface $resultSetPrototype
    );

    /**
     * Fetch entity by id
     *
     * @param integer $id
     *
     * @return \PizzaModification\Entity\ToppingEntity
     */
    public function fetchEntityById($id);

    /**
     * Fetch collection
     *
     * @return \PizzaModification\Collection\ToppingCollection
     */
    public function fetchCollection();

    /**
     * Fetch collection by pizza
     *
     * @param integer $id pizza id
     *
     * @return \PizzaModification\Collection\ToppingCollection
     */
    public function fetchCollectionByPizza($id);

    /**
     * Fetch options
     *
     * @return array
     */
    public function fetchOptions();
}