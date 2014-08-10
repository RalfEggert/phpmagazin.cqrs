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
namespace PizzaCli\Queue;

use CQRS\Command\CommandInterface;
use PizzaCli\Repository\PizzaRepositoryInterface;

/**
 * Class QueueHandler
 *
 * @package PizzaCli
 */
class QueueHandler implements QueueHandlerInterface
{
    /**
     * @var PizzaRepositoryInterface
     */
    protected $pizzaRepository;

    /**
     * @param PizzaRepositoryInterface $pizzaRepository
     */
    function __construct(PizzaRepositoryInterface $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    /**
     * @return \PizzaCli\Repository\PizzaRepositoryInterface
     */
    public function getPizzaRepository()
    {
        return $this->pizzaRepository;
    }

    /**
     * @param $dir
     *
     * @return array
     */
    public function process($dir)
    {
        $fileList = scandir($dir);

        $log = array();

        foreach ($fileList as $fileName) {
            if ('.command' != substr($fileName, -8)) {
                continue;
            }

            /** @var CommandInterface $command */
            $command = unserialize(file_get_contents($dir . '/' . $fileName));

            switch ($command->getCommandName()) {
                case 'createTopping':
                    $this->getPizzaRepository()->createTopping($command);
                    unlink($dir . '/' . $fileName);
                    break;

                case 'updateTopping':
                    $this->getPizzaRepository()->updateTopping($command);
                    unlink($dir . '/' . $fileName);
                    break;

                case 'deleteTopping':
                    $this->getPizzaRepository()->deleteTopping($command);
                    unlink($dir . '/' . $fileName);
                    break;

                case 'createPizza':
                    $this->getPizzaRepository()->createPizza($command);
                    unlink($dir . '/' . $fileName);
                    break;

                case 'updatePizza':
                    $this->getPizzaRepository()->updatePizza($command);
                    unlink($dir . '/' . $fileName);
                    break;

                case 'deletePizza':
                    $this->getPizzaRepository()->deletePizza($command);
                    unlink($dir . '/' . $fileName);
                    break;
            }

            $log[] = $command->getCommandName() . ' from file '
                . $fileName . ' processed';
        }

        return $log;
    }
}