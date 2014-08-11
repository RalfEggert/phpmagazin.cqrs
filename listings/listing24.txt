<?php
namespace PizzaChange\Controller;

use CQRS\Command\CommandHandlerInterface;
use PizzaChange\Command\CreatePizzaCommand;
use PizzaChange\Command\DeletePizzaCommand;
use PizzaChange\Command\UpdatePizzaCommand;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class PizzaController extends AbstractRestfulController
{
    protected $commandHandler;

    public function setCommandHandler($commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    public function getCommandHandler()
    {
        return $this->commandHandler;
    }

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

    public function deleteList()
    {
        return new JsonModel(parent::deleteList());
    }

    public function get($id)
    {
        return new JsonModel(parent::get($id));
    }

    public function getList()
    {
        return new JsonModel(parent::getList());
    }

    public function head($id = null)
    {
        return new JsonModel(parent::head($id));
    }

    public function options()
    {
        return new JsonModel(parent::options());
    }

    public function patch($id, $data)
    {
        return new JsonModel(parent::patch($id, $data));
    }

    public function replaceList($data)
    {
        return new JsonModel(parent::replaceList($data));
    }

    public function patchList($data)
    {
        return new JsonModel(parent::patchList($data));
    }
}
