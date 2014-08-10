<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaCli
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaCli\Controller;

use PizzaCli\Queue\QueueHandlerInterface;
use Zend\Console\ColorInterface;
use Zend\Mvc\Controller\AbstractConsoleController;

/**
 * Class PizzaController
 *
 * @package PizzaCli
 */
class PizzaController extends AbstractConsoleController
{
    /**
     * @var QueueHandlerInterface
     */
    protected $queueHandler;

    /**
     * @param QueueHandlerInterface $queueHandler
     */
    public function setQueueHandler(QueueHandlerInterface $queueHandler)
    {
        $this->queueHandler = $queueHandler;
    }

    /**
     * @return QueueHandlerInterface
     */
    public function getQueueHandler()
    {
        return $this->queueHandler;
    }

    /**
     * Process queue
     */
    public function processQueueAction()
    {
        $this->getConsole()->setColor(ColorInterface::GREEN);
        $this->getConsole()->writeLine(
            str_repeat('-', $this->getConsole()->getWidth())
        );
        $this->getConsole()->writeLine('Process Pizza Queue to update MongoDB read data...');
        $this->getConsole()->writeLine(
            str_repeat('-', $this->getConsole()->getWidth())
        );
        $this->getConsole()->setColor(ColorInterface::NORMAL);

        $log = $this->getQueueHandler()->process(APPLICATION_ROOT . '/data/queue');

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