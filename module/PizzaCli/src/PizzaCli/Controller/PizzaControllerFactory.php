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
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Pizza controller factory
 *
 * Factory to create the controller for pizzas
 *
 * @package    PizzaCli
 */
class PizzaControllerFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     *
     * @param ServiceLocatorInterface $controllerManager
     *
     * @return PizzaController
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $serviceLocator = $controllerManager->getServiceLocator();

        /** @var $queueHandler QueueHandlerInterface */
        $queueHandler = $serviceLocator->get('PizzaCli\Queue\Handler');

        $controller = new PizzaController();
        $controller->setQueueHandler($queueHandler);

        return $controller;
    }
}
