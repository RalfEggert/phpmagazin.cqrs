<?php
namespace PizzaChange\Entity;

use PizzaChange\Collection\ToppingCollectionInterface;
use Zend\Filter\StaticFilter;

class PizzaEntity implements PizzaEntityInterface
{
    protected $id;
    protected $timestamp;
    protected $title;
    protected $description;
    protected $price;
    protected $toppings;

    public function setId($id)
    {
        $this->id = (integer)$id;
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = (string)$timestamp;
    }

    public function setTitle($title)
    {
        $this->title = (string)$title;
    }

    public function setDescription($description)
    {
        $this->description = (string)$description;
    }

    public function setPrice($price)
    {
        $this->price = (integer)$price;
    }

    public function setToppings(ToppingCollectionInterface $toppings)
    {
        $this->toppings = $toppings;
    }

    public function exchangeArray(array $array)
    {
        foreach ($array as $key => $value) {
            $method = 'set';
            $method .= StaticFilter::execute($key, 'wordunderscoretocamelcase');

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getArrayCopy()
    {
        $array = array();

        foreach (get_object_vars($this) as $key => $value) {
            if (property_exists($this, $key)) {
                if ($key == 'toppings') {
                    $array[$key] = $this->$key->getArrayCopy();
                } else {
                    $array[$key] = $this->$key;
                }
            }
        }

        return $array;
    }
}
