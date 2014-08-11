<?php
namespace CQRS\Command;

use CQRS\Event\EventHandlerInterface;

class CommandHandler implements CommandHandlerInterface
{
    protected $eventHandler;

    public function __construct(EventHandlerInterface $eventHandler)
    {
        $this->eventHandler = $eventHandler;
    }

    public function execute(CommandInterface $command)
    {
        $this->eventHandler->trigger(
            $command->getCommandName(), __CLASS__, $command
        );
    }
}
