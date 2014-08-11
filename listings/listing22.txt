<?php
namespace PizzaChange\Event;

use PizzaChange\Command\CreatePizzaCommand;
use PizzaChange\Repository\PizzaRepositoryInterface;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

class CreatePizzaEvent implements ListenerAggregateInterface
{
    protected $pizzaRepository;

    protected $listeners = array();

    public function setPizzaRepository($pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    public function getPizzaRepository()
    {
        return $this->pizzaRepository;
    }

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            CreatePizzaCommand::NAME, array($this, 'createPizza'), 100
        );
        $this->listeners[] = $events->attach(
            CreatePizzaCommand::NAME, array($this, 'addToQueue'), -100
        );
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    public function createPizza(EventInterface $e)
    {
        /** @var CreatePizzaCommand $command */
        $command = $e->getParams();

        return $this->getPizzaRepository()->createPizza($command);
    }

    public function addToQueue(EventInterface $e)
    {
        /** @var CreatePizzaCommand $command */
        $command = $e->getParams();

        if (!$command->getResult()->getSuccess()) {
            return false;
        }

        $serializedCommand = serialize($command);
        $fileName          = APPLICATION_ROOT . '/data/queue/'
            . (microtime() + time())
            . '-'
            . md5($serializedCommand)
            . '.pizza'
            . '.command';

        return file_put_contents($fileName, $serializedCommand);
    }
}
