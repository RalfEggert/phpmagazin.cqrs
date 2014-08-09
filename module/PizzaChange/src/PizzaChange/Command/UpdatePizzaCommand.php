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
 * Class UpdatePizzaCommand
 *
 * @package PizzaChange
 */
class UpdatePizzaCommand extends AbstractCommand
{
    /**
     * Command name
     */
    const NAME = 'updatePizza';

    /**
     * @var int
     */
    protected $id;

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
     * @param int    $id
     * @param string $title
     * @param string $description
     * @param int    $price
     * @param array  $toppings
     */
    public function __construct($id, $title, $description, $price, $toppings)
    {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
        $this->price       = $price;
        $this->toppings    = $toppings;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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