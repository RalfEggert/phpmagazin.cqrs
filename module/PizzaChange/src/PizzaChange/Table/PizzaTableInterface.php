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
 * Class PizzaTable
 *
 * @package PizzaChange
 */
interface PizzaTableInterface extends TableGatewayInterface
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
     * @return \PizzaChange\Entity\PizzaEntity
     */
    public function fetchEntityById($id);
}