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
 * Class UpdateToppingCommand
 *
 * @package PizzaChange
 */
class UpdateToppingCommand extends AbstractCommand
{
    /**
     * Command name
     */
    const NAME = 'updateTopping';

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $price;

    /**
     * @param int    $id
     * @param string $title
     * @param int    $price
     */
    public function __construct($id, $title, $price)
    {
        $this->id    = $id;
        $this->title = $title;
        $this->price = $price;
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
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

}