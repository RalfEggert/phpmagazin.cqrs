<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaRead
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaRead\Controller;

use PizzaRead\Repository\PizzaRepositoryInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Pizza controller factory
 *
 * Factory to create the controller for pizzas
 *
 * @package    PizzaRead
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

        /** @var $pizzaRepository PizzaRepositoryInterface */
        $pizzaRepository = $serviceLocator->get('PizzaRead\Repository\Pizza');

        $controller = new PizzaController();
        $controller->setPizzaRepository($pizzaRepository);

        return $controller;
    }
}
