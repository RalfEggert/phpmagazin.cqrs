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

use CQRS\Event\EventHandlerInterface;

/**
 * Class CommandHandler
 *
 * @package CQRS
 */
interface CommandHandlerInterface
{
    /**
     * @param EventHandlerInterface $eventHandler
     */
    public function __construct(EventHandlerInterface $eventHandler);

    /**
     * @param CommandInterface $command
     */
    public function execute(CommandInterface $command);
}