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
 * @package PizzaView
 */
interface PizzaRepositoryInterface
{
    /**
     * @param CollectionInterface $toppingCollection
     */
    public function setToppingCollection(
        CollectionInterface $toppingCollection
    );

    /**
     * @return CollectionInterface
     */
    public function getPizzaCollection();

    /**
     * @param CollectionInterface $pizzaCollection
     */
    public function setPizzaCollection(CollectionInterface $pizzaCollection);

    /**
     * @return CollectionInterface
     */
    public function getToppingCollection();

    /**
     * Fetch all pizzas
     *
     * @return array
     */
    public function fetchPizzas();

    /**
     * Fetch pizza by id
     *
     * @param integer $id
     *
     * @return array
     */
    public function fetchPizzaById($id);

    /**
     * Fetch topping by id
     *
     * @param integer $id
     *
     * @return array
     */
    public function fetchToppingById($id);

    /**
     * Fetch all toppings
     *
     * @return array
     */
    public function fetchToppings();
}