<?php
namespace PizzaRead\Controller;

use PizzaRead\Repository\PizzaRepositoryInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PizzaControllerFactory implements FactoryInterface
{
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

