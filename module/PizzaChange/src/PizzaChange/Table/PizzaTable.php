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

use PizzaChange\Entity\PizzaEntity;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class PizzaTable
 *
 * @package PizzaChange
 */
class PizzaTable extends TableGateway implements PizzaTableInterface
{
    /**
     * @param AdapterInterface                      $adapter
     * @param \Zend\Db\ResultSet\ResultSetInterface $resultSetPrototype
     */
    public function __construct(
        AdapterInterface $adapter, ResultSetInterface $resultSetPrototype
    ) {
        parent::__construct('pizzas', $adapter, null, $resultSetPrototype);
    }

    /**
     * Fetch entity by id
     *
     * @param int $id
     *
     * @return \PizzaChange\Entity\PizzaEntity
     */
    public function fetchEntityById($id)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('id', $id);

        $entity = new PizzaEntity();
        $entity->exchangeArray($this->selectWith($select)->current());

        return $entity;
    }
}