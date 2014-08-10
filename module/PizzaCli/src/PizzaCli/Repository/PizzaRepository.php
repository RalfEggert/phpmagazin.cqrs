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
class PizzaRepository implements PizzaRepositoryInterface
{
    /**
     * @var CollectionInterface
     */
    protected $pizzaCollection;

    /**
     * @var ToppingCollectionInterface
     */
    protected $toppingCollection;

    /**
     * @param CollectionInterface $pizzaCollection
     */
    public function setPizzaCollection(CollectionInterface $pizzaCollection)
    {
        $this->pizzaCollection = $pizzaCollection;
    }

    /**
     * @return CollectionInterface
     */
    public function getPizzaCollection()
    {
        return $this->pizzaCollection;
    }

    /**
     * @param ToppingCollectionInterface $toppingCollection
     */
    public function setToppingCollection(ToppingCollectionInterface $toppingCollection)
    {
        $this->toppingCollection = $toppingCollection;
    }

    /**
     * @return ToppingCollectionInterface
     */
    public function getToppingCollection()
    {
        return $this->toppingCollection;
    }

    /**
     * Fetch mongo id by pizza id
     *
     * @param int $id
     *
     * @return MongoId
     */
    public function fetchMongoIdByPizzaId($id)
    {
        return $this->getPizzaCollection()->fetchMongoIdByPizzaId($id);
    }

    /**
     * Fetch mongo id by topping id
     *
     * @param int $id
     *
     * @return MongoId
     */
    public function fetchMongoIdByToppingId($id)
    {
        return $this->getToppingCollection()->fetchMongoIdByToppingId($id);
    }

    /**
     * @param CreateToppingCommand $command
     *
     * @return bool
     */
    public function createTopping(CreateToppingCommand $command)
    {
        return $this->getToppingCollection()->insert(
            $command->getResult()->getData()
        );
    }

    /**
     * @param UpdateToppingCommand $command
     *
     * @return bool
     */
    public function updateTopping(UpdateToppingCommand $command)
    {
        $mongoId = $this->fetchMongoIdByToppingId((int) $command->getId());

        return $this->getToppingCollection()->update(
            $command->getResult()->getData(), $mongoId
        );
    }

    /**
     * @param DeleteToppingCommand $command
     *
     * @return bool
     */
    public function deleteTopping(DeleteToppingCommand $command)
    {
        $mongoId = $this->fetchMongoIdByToppingId((int) $command->getId());

        return $this->getToppingCollection()->delete($mongoId);
    }

    /**
     * @param CreatePizzaCommand $command
     *
     * @return bool
     */
    public function createPizza(CreatePizzaCommand $command)
    {
        return $this->getPizzaCollection()->insert(
            $command->getResult()->getData()
        );
    }

    /**
     * @param UpdatePizzaCommand $command
     *
     * @return bool
     */
    public function updatePizza(UpdatePizzaCommand $command)
    {
        $mongoId = $this->fetchMongoIdByPizzaId((int) $command->getId());

        return $this->getPizzaCollection()->update(
            $command->getResult()->getData(), $mongoId
        );
    }

    /**
     * @param DeletePizzaCommand $command
     *
     * @return bool
     */
    public function deletePizza(DeletePizzaCommand $command)
    {
        $mongoId = $this->fetchMongoIdByPizzaId((int) $command->getId());

        return $this->getPizzaCollection()->delete($mongoId);
    }
}