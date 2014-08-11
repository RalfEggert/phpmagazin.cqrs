<?php
namespace CQRS\Event;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EventHandlerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var array $config */
        $config = $serviceLocator->get('Config');

        $eventHandler = new EventHandler();

        foreach ($config['event_handler']['events'] as $eventIdentifier) {
            $event = $serviceLocator->get($eventIdentifier);

            $eventHandler->attachAggregate($event);
        }

        return $eventHandler;
    }

} 
