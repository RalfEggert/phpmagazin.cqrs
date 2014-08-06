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
namespace PizzaModification\Repository;

use PizzaModification\Entity\PizzaEntityInterface;
use PizzaModification\Table\PizzaTableInterface;
use PizzaModification\Table\ToppingTableInterface;

/**
 * Class PizzaRepository
 *
 * @package PizzaModification\Repository
 */
class PizzaRepository
{
    /**
     * @var PizzaTableInterface
     */
    protected $pizzaTable;

    /**
     * @var ToppingTableInterface
     */
    protected $toppingTable;

    /**
     * @param \PizzaModification\Table\PizzaTableInterface $pizzaTable
     */
    public function setPizzaTable(PizzaTableInterface $pizzaTable)
    {
        $this->pizzaTable = $pizzaTable;
    }

    /**
     * @return \PizzaModification\Table\PizzaTableInterface
     */
    public function getPizzaTable()
    {
        return $this->pizzaTable;
    }

    /**
     * @param \PizzaModification\Table\ToppingTableInterface $toppingTable
     */
    public function setToppingTable(ToppingTableInterface $toppingTable)
    {
        $this->toppingTable = $toppingTable;
    }

    /**
     * @return \PizzaModification\Table\ToppingTableInterface
     */
    public function getToppingTable()
    {
        return $this->toppingTable;
    }

    /**
     * Fetch entity by id
     *
     * @param integer $id
     *
     * @return PizzaEntityInterface
     */
    public function fetchEntityById($id)
    {
        $pizza = $this->getPizzaTable()->fetchSingleById($id);

        $toppings = $this->getToppingTable()->fetchCollectionByPizza($id);

        $pizza->setToppings($toppings);

        return $pizza;
    }
}