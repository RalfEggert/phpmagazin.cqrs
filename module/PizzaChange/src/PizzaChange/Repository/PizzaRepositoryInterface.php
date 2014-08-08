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
namespace PizzaChange\Repository;

use PizzaChange\Entity\PizzaEntityInterface;
use PizzaChange\Table\PizzaTableInterface;
use PizzaChange\Table\ToppingTableInterface;

/**
 * Class PizzaRepository
 *
 * @package PizzaChange
 */
interface PizzaRepositoryInterface
{
    /**
     * @param \PizzaChange\Table\PizzaTableInterface $pizzaTable
     */
    public function setPizzaTable(PizzaTableInterface $pizzaTable);

    /**
     * @return \PizzaChange\Table\PizzaTableInterface
     */
    public function getPizzaTable();

    /**
     * @param \PizzaChange\Table\ToppingTableInterface $toppingTable
     */
    public function setToppingTable(ToppingTableInterface $toppingTable);

    /**
     * @return \PizzaChange\Table\ToppingTableInterface
     */
    public function getToppingTable();

    /**
     * @param \PizzaChange\Table\PizzaToppingsTableInterface $pizzaToppingsTable
     */
    public function setPizzaToppingsTable($pizzaToppingsTable);

    /**
     * @return \PizzaChange\Table\PizzaToppingsTableInterface
     */
    public function getPizzaToppingsTable();

    /**
     * Fetch entity by id
     *
     * @param int $id
     *
     * @return PizzaEntityInterface
     */
    public function fetchEntityById($id);
}