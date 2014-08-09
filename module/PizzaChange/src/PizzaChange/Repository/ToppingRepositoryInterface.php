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

use PizzaChange\Command\CreateToppingCommand;
use PizzaChange\Command\DeleteToppingCommand;
use PizzaChange\Command\UpdateToppingCommand;
use PizzaChange\Entity\ToppingEntityInterface;
use PizzaChange\Table\ToppingTableInterface;

/**
 * Class ToppingRepository
 *
 * @package PizzaChange
 */
interface ToppingRepositoryInterface
{
    /**
     * @param \PizzaChange\Table\ToppingTableInterface $toppingTable
     */
    public function setToppingTable(ToppingTableInterface $toppingTable);

    /**
     * @return \PizzaChange\Table\ToppingTableInterface
     */
    public function getToppingTable();

    /**
     * Fetch entity by id
     *
     * @param int $id
     *
     * @return ToppingEntityInterface
     */
    public function fetchEntityById($id);

    /**
     * @param CreateToppingCommand $command
     *
     * @return bool
     */
    public function createTopping(CreateToppingCommand $command);

    /**
     * @param UpdateToppingCommand $command
     *
     * @return bool
     */
    public function updateTopping(UpdateToppingCommand $command);

    /**
     * @param DeleteToppingCommand $command
     *
     * @return bool
     */
    public function deleteTopping(DeleteToppingCommand $command);
}