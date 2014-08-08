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
namespace PizzaRead\Collection;

use MongoDB;
use MongoDB\Collection\AbstractCollection;

/**
 * Topping collection
 *
 * Collection to represent a topping
 *
 * @package    PizzaRead
 */
class ToppingCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $collectionName = 'toppings';
}
