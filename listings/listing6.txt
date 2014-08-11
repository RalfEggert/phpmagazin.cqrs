<?php
namespace PizzaRead\Repository;

use MongoDB\Collection\CollectionInterface;

class PizzaRepository implements PizzaRepositoryInterface
{
    protected $pizzaCollection;

    protected $toppingCollection;

    public function setPizzaCollection(CollectionInterface $pizzaCollection)
    {
        $this->pizzaCollection = $pizzaCollection;
    }

    public function getPizzaCollection()
    {
        return $this->pizzaCollection;
    }

    public function setToppingCollection(CollectionInterface $toppingCollection)
    {
        $this->toppingCollection = $toppingCollection;
    }

    public function getToppingCollection()
    {
        return $this->toppingCollection;
    }

    public function fetchPizzaById($id)
    {
        return $this->getPizzaCollection()->fetchSingleById($id);
    }

    public function fetchPizzas()
    {
        return $this->getPizzaCollection()->fetchList();
    }

    public function fetchToppingById($id)
    {
        return $this->getToppingCollection()->fetchSingleById($id);
    }

    public function fetchToppings()
    {
        return $this->getToppingCollection()->fetchList();
    }
}
