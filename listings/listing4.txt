<?php
namespace PizzaRead\Collection;

use MongoDB;
use MongoDB\Collection\AbstractCollection;

class PizzaCollection extends AbstractCollection
{
    protected $collectionName = 'pizzas';
}

