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
class ToppingRepository implements ToppingRepositoryInterface
{
    /**
     * @var CollectionInterface
     */
    protected $toppingCollection;

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
     * Fetch topping by id
     *
     * @param int $id
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