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
interface CommandHandlerInterface
{
    /**
     * @param EventManagerInterface $eventHandler
     */
    public function __construct(EventManagerInterface $eventHandler);

    /**
     * @param CommandInterface $command
     */
    public function execute(CommandInterface $command);
}