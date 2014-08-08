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
use PizzaChange\Command\CreateToppingCommand;
use PizzaChange\Command\DeleteToppingCommand;
use PizzaChange\Command\UpdateToppingCommand;
use PizzaChange\Entity\ToppingEntityInterface;
use PizzaChange\Table\ToppingTableInterface;
use Zend\Db\Adapter\Exception\InvalidQueryException;

/**
 * Class ToppingRepository
 *
 * @package PizzaChange
 */
class ToppingRepository implements ToppingRepositoryInterface
{
    /**
     * @var ToppingTableInterface
     */
    protected $toppingTable;

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
     * Fetch entity by id
     *
     * @param int $id
     *
     * @return ToppingEntityInterface
     */
    public function fetchEntityById($id)
    {
        return $this->getToppingTable()->fetchEntityById($id);
    }

    /**
     * @param CreateToppingCommand $command
     *
     * @return bool
     */
    public function createTopping(CreateToppingCommand $command)
    {
        $result = new CommandResult();
        $command->setResult($result);

        $createData = array(
            'title' => $command->getTitle(),
            'price' => $command->getPrice(),
        );

        try {
            $this->getToppingTable()->insert($createData);

            $toppingId = $this->getToppingTable()->getLastInsertValue();
        } catch (InvalidQueryException $e) {
            $result->setSuccess(false);

            return false;
        }

        $result->setSuccess(true);
        $result->setData(
            $this->fetchEntityById($toppingId)->getArrayCopy()
        );

        return true;
    }

    /**
     * @param UpdateToppingCommand $command
     *
     * @return bool
     */
    public function updateTopping(UpdateToppingCommand $command)
    {
        $result = new CommandResult();
        $command->setResult($result);

        $toppingId = $command->getId();

        $updateData = array(
            'title' => $command->getTitle(),
            'price' => $command->getPrice(),
        );

        if (!$this->fetchEntityById($toppingId)) {
            $result->setSuccess(false);

            return false;
        }

        try {
            $this->getToppingTable()->update($updateData, array('id' => $toppingId));
        } catch (InvalidQueryException $e) {
            $result->setSuccess(false);

            return false;
        }

        $result->setSuccess(true);
        $result->setData(
            $this->fetchEntityById($toppingId)->getArrayCopy()
        );

        return true;
    }

    /**
     * @param DeleteToppingCommand $command
     *
     * @return bool
     */
    public function deleteTopping(DeleteToppingCommand $command)
    {
        $result = new CommandResult();
        $command->setResult($result);

        $toppingId = $command->getId();

        if (!$this->fetchEntityById($toppingId)) {
            $result->setSuccess(false);

            return false;
        }

        try {
            $this->getToppingTable()->delete(array('id' => $toppingId));
        } catch (InvalidQueryException $e) {
            $result->setSuccess(false);

            return false;
        }

        $result->setSuccess(true);

        return true;
    }
}