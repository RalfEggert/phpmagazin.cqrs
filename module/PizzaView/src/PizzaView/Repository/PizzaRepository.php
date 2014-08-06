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
namespace PizzaView\Repository;

use MongoDB\Collection\CollectionInterface;

/**
 * Class PizzaRepository
 *
 * @package PizzaView\Repository
 */
class PizzaRepository implements PizzaRepositoryInterface
{
    /**
     * @var CollectionInterface
     */
    protected $pizzaCollection;

    /**
     * @var CollectionInterface
     */
    protected $toppingCollection;

    /**
     * @param CollectionInterface $pizzaCollection
     */
    public function setPizzaCollection(CollectionInterface $pizzaCollection)
    {
        $this->pizzaCollection = $pizzaCollection;
    }

    /**
     * @return CollectionInterface
     */
    public function getPizzaCollection()
    {
        return $this->pizzaCollection;
    }

    /**
     * @param CollectionInterface $toppingCollection
     */
    public function setToppingCollection(CollectionInterface $toppingCollection)
    {
        $this->toppingCollection = $toppingCollection;
    }

    /**
     * @return CollectionInterface
     */
    public function getToppingCollection()
    {
        return $this->toppingCollection;
    }

    /**
     * Fetch pizza by id
     *
     * @param integer $id
     *
     * @return array
     */
    public function fetchPizzaById($id)
    {
        return $this->getPizzaCollection()->fetchSingleById($id);
    }

    /**
     * Fetch all pizzas
     *
     * @return array
     */
    public function fetchPizzas()
    {
        return $this->getPizzaCollection()->fetchList();
    }

    /**
     * Fetch topping by id
     *
     * @param integer $id
     *
     * @return array
     */
    public function fetchToppingById($id)
    {
        return $this->getToppingCollection()->fetchSingleById($id);
    }

    /**
     * Fetch all toppings
     *
     * @return array
     */
    public function fetchToppings()
    {
        return $this->getToppingCollection()->fetchList();
    }
}