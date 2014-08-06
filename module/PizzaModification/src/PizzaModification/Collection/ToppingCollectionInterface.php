<?php
/**
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
interface ToppingCollectionInterface extends \Iterator, \Countable
{
    /**
     * Add another entity
     *
     * @param ToppingEntityInterface $entity
     */
    public function addEntity(ToppingEntityInterface $entity);

    /**
     * Return an array representation of the collection
     *
     * @return array
     */
    public function getArrayCopy();
}