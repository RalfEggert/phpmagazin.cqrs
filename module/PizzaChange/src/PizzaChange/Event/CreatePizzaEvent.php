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
namespace PizzaChange\Event;

use PizzaChange\Command\CreatePizzaCommand;
use PizzaChange\Repository\PizzaRepositoryInterface;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

/**
 * Class CreatePizzaEvent
 *
 * @package PizzaChange
 */
class CreatePizzaEvent implements ListenerAggregateInterface
{
    /**
     * @var PizzaRepositoryInterface
     */
    protected $pizzaRepository;

    /**
     * @var array
     */
    protected $listeners = array();

    /**
     * @param \PizzaChange\Repository\PizzaRepositoryInterface $pizzaRepository
     */
    public function setPizzaRepository($pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    /**
     * @return \PizzaChange\Repository\PizzaRepositoryInterface
     */
    public function getPizzaRepository()
    {
        return $this->pizzaRepository;
    }

    /**
     * Attach one or more listeners
     *
     * Implementors may add an optional $priority argument; the EventManager
     * implementation will pass this to the aggregate.
     *
     * @param EventManagerInterface $events
     *
     * @return void
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            CreatePizzaCommand::NAME, array($this, 'createPizza'), 100
        );
        $this->listeners[] = $events->attach(
            CreatePizzaCommand::NAME, array($this, 'addToQueue'), -100
        );
    }

    /**
     * Detach all previously attached listeners
     *
     * @param EventManagerInterface $events
     *
     * @return void
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * @param EventInterface $e
     *
     * @return bool
     */
    public function createPizza(EventInterface $e)
    {
        /** @var CreatePizzaCommand $command */
        $command = $e->getParams();

        return $this->getPizzaRepository()->createPizza($command);
    }

    /**
     * @param EventInterface $e
     *
     * @return int
     */
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