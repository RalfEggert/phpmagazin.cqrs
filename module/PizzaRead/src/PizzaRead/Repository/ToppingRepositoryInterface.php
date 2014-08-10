<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaRead
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaRead\Repository;

use MongoDB\Collection\CollectionInterface;

/**
 * Class ToppingRepository
 *
 * @package PizzaRead
 */
interface ToppingRepositoryInterface
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
    public function getToppingCollection();

    /**
     * Fetch topping by id
     *
     * @param int $id
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