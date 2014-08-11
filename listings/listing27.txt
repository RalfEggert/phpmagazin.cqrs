<?php
namespace PizzaCli\Controller;

use PizzaCli\Queue\QueueHandlerInterface;
use Zend\Console\ColorInterface;
use Zend\Mvc\Controller\AbstractConsoleController;

class PizzaController extends AbstractConsoleController
{
    protected $queueHandler;

    public function setQueueHandler(QueueHandlerInterface $queueHandler)
    {
        $this->queueHandler = $queueHandler;
    }

    public function getQueueHandler()
    {
        return $this->queueHandler;
    }

    public function processQueueAction()
    {
        $this->getConsole()->setColor(ColorInterface::GREEN);
        $this->getConsole()->writeLine(
            str_repeat('-', $this->getConsole()->getWidth())
        );
        $this->getConsole()->writeLine(
            'Process Pizza Queue to update MongoDB read data...'
        );
        $this->getConsole()->writeLine(
            str_repeat('-', $this->getConsole()->getWidth())
        );
        $this->getConsole()->setColor(ColorInterface::NORMAL);

        $log = $this->getQueueHandler()->process(
            APPLICATION_ROOT . '/data/queue'
        );

        foreach ($log as $line) {
            $this->getConsole()->writeLine($line);
        }

        $this->getConsole()->setColor(ColorInterface::GREEN);
        $this->getConsole()->writeLine(
            str_repeat('-', $this->getConsole()->getWidth())
        );
        $this->getConsole()->writeLine('Processing finished...');
        $this->getConsole()->writeLine(
            str_repeat('-', $this->getConsole()->getWidth())
        );
        $this->getConsole()->setColor(ColorInterface::NORMAL);
    }
}
