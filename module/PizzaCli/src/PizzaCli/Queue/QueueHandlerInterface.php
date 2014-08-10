<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaCli
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaCli\Queue;

use PizzaCli\Repository\PizzaRepositoryInterface;

/**
 * Class QueueHandler
 *
 * @package PizzaCli
 */
interface QueueHandlerInterface
{
    /**
     * @param PizzaRepositoryInterface $pizzaRepository
     */
    function __construct(PizzaRepositoryInterface $pizzaRepository);

    /**
     * @return \PizzaCli\Repository\PizzaRepositoryInterface
     */
    public function getPizzaRepository();
}