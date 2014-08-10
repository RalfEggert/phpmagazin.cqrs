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
namespace PizzaCli\Repository;

use MongoDB\Collection\CollectionInterface;
use MongoId;
use PizzaChange\Command\CreatePizzaCommand;
use PizzaChange\Command\CreateToppingCommand;
use PizzaChange\Command\DeletePizzaCommand;
use PizzaChange\Command\DeleteToppingCommand;
use PizzaChange\Command\UpdatePizzaCommand;
use PizzaChange\Command\UpdateToppingCommand;
use PizzaCli\Collection\ToppingCollectionInterface;

/**
 * Class PizzaRepository
 *
 * @package PizzaCli
 */
interface PizzaRepositoryInterface
{
    /**
     * @param CollectionInterface $pizzaCollection
     */
    public function setPizzaCollection(CollectionInterface $pizzaCollection);

    /**
     * @return CollectionInterface
     */
    public function getPizzaCollection();

    /**
     * @param ToppingCollectionInterface $toppingCollection
     */
    public function setToppingCollection(
        ToppingCollectionInterface $toppingCollection
    );

    /**
     * @return ToppingCollectionInterface
     */
    public function getToppingCollection();

    /**
     * Fetch mongo id by pizza id
     *
     * @param int $id
     *
     * @return MongoId
     */
    public function fetchMongoIdByPizzaId($id);

    /**
     * Fetch mongo id by topping id
     *
     * @param int $id
     *
     * @return array
     */
    public function fetchMongoIdByToppingId($id);

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

    /**
     * @param CreatePizzaCommand $command
     *
     * @return bool
     */
    public function createPizza(CreatePizzaCommand $command);

    /**
     * @param UpdatePizzaCommand $command
     *
     * @return bool
     */
    public function updatePizza(UpdatePizzaCommand $command);

    /**
     * @param DeletePizzaCommand $command
     *
     * @return bool
     */
    public function deletePizza(DeletePizzaCommand $command);
}