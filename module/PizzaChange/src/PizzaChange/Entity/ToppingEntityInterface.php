<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaChange
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaChange\Entity;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class ToppingEntity
 *
 * @package PizzaChange
 */
interface ToppingEntityInterface extends ArraySerializableInterface
{
    /**
     * @return int
     */
    public function getId();

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
     * @param int $price
     */
    public function setPrice($price);
}