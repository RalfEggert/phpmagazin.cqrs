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
class PizzaRepository implements PizzaRepositoryInterface
{
    /**
     * @var CollectionInterface
     */
    protected $pizzaCollection;

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
     * Fetch pizza by id
     *
     * @param int $id
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
}