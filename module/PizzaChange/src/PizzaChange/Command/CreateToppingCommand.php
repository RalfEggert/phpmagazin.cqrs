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
 * Class CreateToppingCommand
 *
 * @package PizzaChange
 */
class CreateToppingCommand extends AbstractCommand
{
    /**
     * Command name
     */
    const NAME = 'createTopping';

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $price;

    /**
     * @param string $title
     * @param int    $price
     */
    public function __construct($title, $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

}