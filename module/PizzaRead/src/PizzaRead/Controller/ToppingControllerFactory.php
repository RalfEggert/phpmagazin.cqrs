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
class ToppingControllerFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     *
     * @param ServiceLocatorInterface $controllerManager
     *
     * @return ToppingController
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $serviceLocator = $controllerManager->getServiceLocator();

        /** @var $toppingRepository ToppingRepositoryInterface */
        $toppingRepository = $serviceLocator->get('PizzaRead\Repository\Topping');

        $controller = new ToppingController();
        $controller->setToppingRepository($toppingRepository);

        return $controller;
    }
}
