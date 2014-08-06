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
namespace PizzaModification\Collection;

use PizzaModification\Entity\ToppingEntityInterface;

/**
 * Class ToppingCollection
 *
 * @package PizzaModification\Collection
 */
class ToppingCollection implements ToppingCollectionInterface
{
    /**
     * A collection of ToppingEntityInterface objects
     *
     * @var ToppingEntityInterface[]
     */
    protected $collection = array();

    /**
     * Add another entity
     *
     * @param ToppingEntityInterface $entity
     */
    public function addEntity(ToppingEntityInterface $entity)
    {
        $this->collection[$entity->getId()] = $entity;
    }

    /**
     * Return an array representation of the collection
     *
     * @return array
     */
    public function getArrayCopy()
    {
        $array = array();

        /* @var $entity ToppingEntityInterface */
        foreach ($this as $entity) {
            $array[$entity->getId()] = $entity->getArrayCopy();
        }

        return $array;
    }

    /**
     * Return the current element
     *
     * @return ToppingEntityInterface $entity
     */
    public function current()
    {
        return current($this->collection);
    }

    /**
     * Move forward to next element
     *
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->collection);
    }

    /**
     * Return the key of the current element
     *
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return key($this->collection);
    }

    /**
     * Checks if current position is valid
     *
     * @return boolean The return value will be casted to boolean and then
     *                 evaluated. Returns true on success or false on failure.
     */
    public function valid()
    {
        return $this->current() !== false;
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        reset($this->collection);
    }

    /**
     * Count elements of an object
     *
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return count($this->collection);
    }
}