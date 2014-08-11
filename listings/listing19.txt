<?php
namespace PizzaChange\Table;

use PizzaChange\Collection\ToppingCollection;
use PizzaChange\Entity\ToppingEntity;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\TableGateway\TableGateway;

class ToppingTable extends TableGateway implements ToppingTableInterface
{
    public function __construct(
        AdapterInterface $adapter, ResultSetInterface $resultSetPrototype
    ) {
        parent::__construct('toppings', $adapter, null, $resultSetPrototype);
    }

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
} 
