<?php
namespace PizzaCli\Queue;

use CQRS\Command\CommandInterface;
use PizzaCli\Repository\PizzaRepositoryInterface;

class QueueHandler implements QueueHandlerInterface
{
    protected $pizzaRepository;

    function __construct(PizzaRepositoryInterface $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    public function getPizzaRepository()
    {
        return $this->pizzaRepository;
    }

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
