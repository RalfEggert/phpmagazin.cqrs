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
namespace PizzaModification\Entity;

use PizzaModification\Collection\ToppingCollectionInterface;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class PizzaEntity
 *
 * @package PizzaModification\Entity
 */
interface PizzaEntityInterface extends ArraySerializableInterface
{
    /**
     * @param int $id
     */
    public function setId($id);

    /**
     * @param string $timestamp
     */
    public function setTimestamp($timestamp);

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @param string $description
     */
    public function setDescription($description);

    /**
     * @param int $price
     */
    public function setPrice($price);

    /**
     * @param ToppingCollectionInterface $toppings
     */
    public function setToppings(ToppingCollectionInterface $toppings);
}