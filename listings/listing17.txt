<?php
namespace PizzaChange\Collection;

use PizzaChange\Entity\ToppingEntityInterface;

class ToppingCollection implements ToppingCollectionInterface
{
    protected $collection = array();

    public function addEntity(ToppingEntityInterface $entity)
    {
        $this->collection[$entity->getId()] = $entity;
    }

    public function getArrayCopy()
    {
        $array = array();

        /** @var $entity ToppingEntityInterface */
        foreach ($this as $entity) {
            $array[$entity->getId()] = $entity->getArrayCopy();
        }

        return $array;
    }

    public function current()
    {
        return current($this->collection);
    }

    public function next()
    {
        next($this->collection);
    }

    public function key()
    {
        return key($this->collection);
    }

    public function valid()
    {
        return $this->current() !== false;
    }

    public function rewind()
    {
        reset($this->collection);
    }

    public function count()
    {
        return count($this->collection);
    }
}
