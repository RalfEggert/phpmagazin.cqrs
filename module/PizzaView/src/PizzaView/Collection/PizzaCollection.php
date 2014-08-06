<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaView
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaView\Collection;

use MongoDB\Collection\AbstractCollection;
use MongoDB;

/**
 * Pizza collection
 *
 * Collection to represent a pizza
 *
 * @package    PizzaView
 */
class PizzaCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $collectionName = 'pizzas';
}
