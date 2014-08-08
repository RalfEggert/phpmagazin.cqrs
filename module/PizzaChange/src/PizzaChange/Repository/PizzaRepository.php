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

use CQRS\Command\CommandResult;
use PizzaChange\Command\CreatePizzaCommand;
use PizzaChange\Entity\PizzaEntityInterface;
use PizzaChange\Table\PizzaTableInterface;
use PizzaChange\Table\PizzaToppingsTableInterface;
use PizzaChange\Table\ToppingTableInterface;
use Zend\Db\Adapter\Exception\InvalidQueryException;

/**
 * Class PizzaRepository
 *
 * @package PizzaChange
 */
class PizzaRepository implements PizzaRepositoryInterface
{
    /**
     * @var PizzaTableInterface
     */
    protected $pizzaTable;

    /**
     * @var ToppingTableInterface
     */
    protected $toppingTable;

    /**
     * @var PizzaToppingsTableInterface
     */
    protected $pizzaToppingsTable;

    /**
     * @param \PizzaChange\Table\PizzaTableInterface $pizzaTable
     */
    public function setPizzaTable(PizzaTableInterface $pizzaTable)
    {
        $this->pizzaTable = $pizzaTable;
    }

    /**
     * @return \PizzaChange\Table\PizzaTableInterface
     */
    public function getPizzaTable()
    {
        return $this->pizzaTable;
    }

    /**
     * @param \PizzaChange\Table\ToppingTableInterface $toppingTable
     */
    public function setToppingTable(ToppingTableInterface $toppingTable)
    {
        $this->toppingTable = $toppingTable;
    }

    /**
     * @return \PizzaChange\Table\ToppingTableInterface
     */
    public function getToppingTable()
    {
        return $this->toppingTable;
    }

    /**
     * @param \PizzaChange\Table\PizzaToppingsTableInterface $pizzaToppingsTable
     */
    public function setPizzaToppingsTable($pizzaToppingsTable)
    {
        $this->pizzaToppingsTable = $pizzaToppingsTable;
    }

    /**
     * @return \PizzaChange\Table\PizzaToppingsTableInterface
     */
    public function getPizzaToppingsTable()
    {
        return $this->pizzaToppingsTable;
    }

    /**
     * Fetch entity by id
     *
     * @param int $id
     *
     * @return PizzaEntityInterface
     */
    public function fetchEntityById($id)
    {
        $pizza = $this->getPizzaTable()->fetchEntityById($id);

        $toppings = $this->getToppingTable()->fetchCollectionByPizza($id);

        $pizza->setToppings($toppings);

        return $pizza;
    }

    /**
     * @param CreatePizzaCommand $command
     *
     * @return bool
     */
    public function createPizza(CreatePizzaCommand $command)
    {
        $result = new CommandResult();
        $command->setResult($result);

        $createData = array(
            'title'       => $command->getTitle(),
            'description' => $command->getDescription(),
            'price'       => $command->getPrice(),
        );

        try {
            $this->getPizzaTable()->insert($createData);

            $pizzaId = $this->getPizzaTable()->getLastInsertValue();
        } catch (InvalidQueryException $e) {
            $result->setSuccess(false);

            return false;
        }

        foreach ($command->getToppings() as $toppingId) {
            $createData = array(
                'pizza'   => $pizzaId,
                'topping' => $toppingId,
            );

            try {
                $this->getPizzaToppingsTable()->insert($createData);
            } catch (InvalidQueryException $e) {
                $result->setSuccess(false);

                return false;
            }
        }

        $result->setSuccess(true);
        $result->setData(
            $this->fetchEntityById($pizzaId)->getArrayCopy()
        );

        return true;
    }
}