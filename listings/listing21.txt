<?php
namespace PizzaChange\Command;

use CQRS\Command\AbstractCommand;

class CreatePizzaCommand extends AbstractCommand
{
    const NAME = 'createPizza';

    protected $title;
    protected $description;
    protected $price;
    protected $toppings;

    public function __construct($title, $description, $price, $toppings)
    {
        $this->title       = $title;
        $this->description = $description;
        $this->price       = $price;
        $this->toppings    = $toppings;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getToppings()
    {
        return $this->toppings;
    }
}
