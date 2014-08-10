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
 * Class PizzaRepository
 *
 * @package PizzaRead
 */
interface PizzaRepositoryInterface
{
    /**
     * @param CollectionInterface $pizzaCollection
     */
    public function setPizzaCollection(CollectionInterface $pizzaCollection);

    /**
     * @return CollectionInterface
     */
    public function getPizzaCollection();

    /**
     * Fetch all pizzas
     *
     * @return array
     */
    public function fetchPizzas();

    /**
     * Fetch pizza by id
     *
     * @param int $id
     *
     * @return array
     */
    public function fetchPizzaById($id);
}