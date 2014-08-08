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

use PizzaChange\Collection\ToppingCollection;
use PizzaChange\Entity\ToppingEntity;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class ToppingTable
 *
 * @package PizzaChange
 */
class ToppingTable extends TableGateway implements ToppingTableInterface
{
    /**
     * @param AdapterInterface                      $adapter
     * @param \Zend\Db\ResultSet\ResultSetInterface $resultSetPrototype
     */
    public function __construct(
        AdapterInterface $adapter, ResultSetInterface $resultSetPrototype
    ) {
        parent::__construct('toppings', $adapter, null, $resultSetPrototype);
    }

    /**
     * Fetch entity by id
     *
     * @param int $id
     *
     * @return boolean|\PizzaChange\Entity\ToppingEntity
     */
    public function fetchEntityById($id)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('id', $id);

        $dataRow = $this->selectWith($select)->current();

        if (!$dataRow) {
            return false;
        }

        $entity = new ToppingEntity();
        $entity->exchangeArray($dataRow);

        return $entity;
    }

    /**
     * Fetch collection
     *
     * @return \PizzaChange\Collection\ToppingCollection
     */
    public function fetchCollection()
    {
        $select = $this->getSql()->select();

        $collection = new ToppingCollection();

        foreach ($this->selectWith($select) as $current) {
            $entity = new ToppingEntity();
            $entity->exchangeArray($current);

            $collection->addEntity($entity);
        }

        return $collection;
    }

    /**
     * Fetch collection by pizza
     *
     * @param int $id pizza id
     *
     * @return \PizzaChange\Collection\ToppingCollection
     */
    public function fetchCollectionByPizza($id)
    {
        $select = $this->getSql()->select();
        $select->join('pizza_toppings', 'topping = id', array());
        $select->where->equalTo('pizza', $id);

        $collection = new ToppingCollection();

        foreach ($this->selectWith($select) as $current) {
            $entity = new ToppingEntity();
            $entity->exchangeArray($current);

            $collection->addEntity($entity);
        }

        return $collection;
    }

    /**
     * Fetch options
     *
     * @return array
     */
    public function fetchOptions()
    {
        $options = array();

        foreach ($this->fetchCollection()->getArrayCopy() as $row) {
            $options[$row['id']] = $row['title'];
        }

        return $options;
    }
} 