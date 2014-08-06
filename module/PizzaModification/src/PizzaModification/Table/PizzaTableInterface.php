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
 * Class PizzaTable
 *
 * @package PizzaModification
 */
interface PizzaTableInterface extends TableGatewayInterface
{
    /**
     * @param AdapterInterface $adapter
     * @param \Zend\Db\ResultSet\ResultSetInterface $resultSetPrototype
     */
    public function __construct(
        AdapterInterface $adapter, ResultSetInterface $resultSetPrototype
    );

    /**
     * Fetch single row by id
     *
     * @param integer $id
     *
     * @return \PizzaModification\Entity\PizzaEntity
     */
    public function fetchSingleById($id);
}