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
namespace PizzaChange\Controller;

use CQRS\Command\CommandHandlerInterface;
use PizzaChange\Command\CreatePizzaCommand;
use PizzaChange\Command\DeletePizzaCommand;
use PizzaChange\Command\UpdatePizzaCommand;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class PizzaController
 *
 * @package PizzaChange
 */
class PizzaController extends AbstractRestfulController
{
    /**
     * @var CommandHandlerInterface
     */
    protected $commandHandler;

    /**
     * @param CommandHandlerInterface $commandHandler
     */
    public function setCommandHandler($commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    /**
     * @return CommandHandlerInterface
     */
    public function getCommandHandler()
    {
        return $this->commandHandler;
    }

    /**
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function create($data)
    {
        $command = new CreatePizzaCommand(
            $data['title'], $data['description'], $data['price'],
            (array)$data['toppings']
        );

        $this->getCommandHandler()->execute($command);

        $result = array(
            'success'    => $command->getResult()->getSuccess(),
            'additional' => $command->getResult()->getData(),
        );

        return new JsonModel($result);
    }

    /**
     * @param mixed $id
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function update($id, $data)
    {
        $command = new UpdatePizzaCommand(
            $id, $data['title'], $data['description'], $data['price'],
            (array)$data['toppings']
        );

        $this->getCommandHandler()->execute($command);

        $result = array(
            'success'    => $command->getResult()->getSuccess(),
            'additional' => $command->getResult()->getData(),
        );

        return new JsonModel($result);
    }

    /**
     * @param mixed $id
     *
     * @return JsonModel
     */
    public function delete($id)
    {
        $command = new DeletePizzaCommand($id);

        $this->getCommandHandler()->execute($command);

        $result = array(
            'success'    => $command->getResult()->getSuccess(),
            'additional' => $command->getResult()->getData(),
        );

        return new JsonModel($result);
    }

    /**
     * @return JsonModel
     */
    public function deleteList()
    {
        return new JsonModel(parent::deleteList());
    }

    /**
     * @param mixed $id
     *
     * @return JsonModel
     */
    public function get($id)
    {
        return new JsonModel(parent::get($id));
    }

    /**
     * @return JsonModel
     */
    public function getList()
    {
        return new JsonModel(parent::getList());
    }

    /**
     * @param null $id
     *
     * @return JsonModel
     */
    public function head($id = null)
    {
        return new JsonModel(parent::head($id));
    }

    /**
     * @return JsonModel
     */
    public function options()
    {
        return new JsonModel(parent::options());
    }

    /**
     * @param $id
     * @param $data
     *
     * @return JsonModel
     */
    public function patch($id, $data)
    {
        return new JsonModel(parent::patch($id, $data));
    }

    /**
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function replaceList($data)
    {
        return new JsonModel(parent::replaceList($data));
    }

    /**
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function patchList($data)
    {
        return new JsonModel(parent::patchList($data));
    }


}