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
    protected $eventManager;

    /**
     * @param EventManagerInterface $eventManager
     */
    public function __construct(EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    /**
     * @param CommandInterface $command
     */
    public function execute(CommandInterface $command)
    {
        $this->eventManager->trigger(
            $command->getCommandName(), __CLASS__, $command
        );
    }
}