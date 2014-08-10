<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    CQRS
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace CQRS\Command;

use Zend\EventManager\EventManagerInterface;

/**
 * Class CommandHandler
 *
 * @package CQRS
 */
class CommandHandler implements CommandHandlerInterface
{
    /**
     * @var EventManagerInterface
     */
    protected $eventHandler;

    /**
     * @param EventManagerInterface $eventHandler
     */
    public function __construct(EventManagerInterface $eventHandler)
    {
        $this->eventHandler = $eventHandler;
    }

    /**
     * @param CommandInterface $command
     */
    public function execute(CommandInterface $command)
    {
        $this->eventHandler->trigger(
            $command->getCommandName(), __CLASS__, $command
        );
    }
}