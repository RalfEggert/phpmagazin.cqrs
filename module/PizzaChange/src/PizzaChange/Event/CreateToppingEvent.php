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

use PizzaChange\Command\CreateToppingCommand;
use PizzaChange\Repository\ToppingRepositoryInterface;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

/**
 * Class CreateToppingEvent
 *
 * @package PizzaChange
 */
class CreateToppingEvent implements ListenerAggregateInterface
{
    /**
     * @var ToppingRepositoryInterface
     */
    protected $toppingRepository;

    /**
     * @var array
     */
    protected $listeners = array();

    /**
     * @param \PizzaChange\Repository\ToppingRepositoryInterface $toppingRepository
     */
    public function setToppingRepository($toppingRepository)
    {
        $this->toppingRepository = $toppingRepository;
    }

    /**
     * @return \PizzaChange\Repository\ToppingRepositoryInterface
     */
    public function getToppingRepository()
    {
        return $this->toppingRepository;
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
            CreateToppingCommand::NAME, array($this, 'createTopping'), 100
        );
        $this->listeners[] = $events->attach(
            CreateToppingCommand::NAME, array($this, 'addToQueue'), -100
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
    public function createTopping(EventInterface $e)
    {
        /** @var CreateToppingCommand $command */
        $command = $e->getParams();

        return $this->getToppingRepository()->createTopping($command);
    }

    /**
     * @param EventInterface $e
     *
     * @return int
     */
    public function addToQueue(EventInterface $e)
    {
        /** @var CreateToppingCommand $command */
        $command = $e->getParams();

        if (!$command->getResult()->getSuccess()) {
            return false;
        }

        $serializedCommand = serialize($command);
        $fileName = APPLICATION_ROOT . '/data/queue/'
            . (microtime() + time())
            . '-'
            . md5($serializedCommand)
            . '.topping'
            . '.command';

        return file_put_contents($fileName, $serializedCommand);
    }
}