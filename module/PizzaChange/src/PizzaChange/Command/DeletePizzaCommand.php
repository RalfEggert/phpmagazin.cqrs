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
 * Class DeletePizzaCommand
 *
 * @package PizzaChange
 */
class DeletePizzaCommand extends AbstractCommand
{
    /**
     * Command name
     */
    const NAME = 'deletePizza';

    /**
     * @var int
     */
    protected $id;

    /**
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}