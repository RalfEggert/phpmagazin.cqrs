<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaChange
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaChange\Table;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\TableGateway\TableGatewayInterface;


/**
 * Class ToppingTable
 *
 * @package PizzaChange
 */
interface ToppingTableInterface extends TableGatewayInterface
{
    /**
     * @param AdapterInterface                      $adapter
     * @param \Zend\Db\ResultSet\ResultSetInterface $resultSetPrototype
     */
    public function __construct(
        AdapterInterface $adapter, ResultSetInterface $resultSetPrototype
    );

    /**
     * Fetch entity by id
     *
     * @param int $id
     *
     * @return boolean|\PizzaChange\Entity\ToppingEntity
     */
    public function fetchEntityById($id);

    /**
     * Fetch collection
     *
     * @return \PizzaChange\Collection\ToppingCollection
     */
    public function fetchCollection();

    /**
     * Fetch collection by pizza
     *
     * @param int $id pizza id
     *
     * @return \PizzaChange\Collection\ToppingCollection
     */
    public function fetchCollectionByPizza($id);

    /**
     * Fetch options
     *
     * @return array
     */
    public function fetchOptions();
}