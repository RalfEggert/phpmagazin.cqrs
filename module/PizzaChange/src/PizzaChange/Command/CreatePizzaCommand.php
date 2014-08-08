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
namespace PizzaChange\Command;

use CQRS\Command\AbstractCommand;

/**
 * Class CreatePizzaCommand
 *
 * @package PizzaChange
 */
class CreatePizzaCommand extends AbstractCommand
{
    /**
     * Command name
     */
    const NAME = 'createPizza';

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $price;

    /**
     * @var array
     */
    protected $toppings;

    /**
     * @param string $title
     * @param string $description
     * @param int    $price
     * @param array  $toppings
     */
    public function __construct($title, $description, $price, $toppings)
    {
        $this->title       = $title;
        $this->description = $description;
        $this->price       = $price;
        $this->toppings    = $toppings;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return array
     */
    public function getToppings()
    {
        return $this->toppings;
    }

}