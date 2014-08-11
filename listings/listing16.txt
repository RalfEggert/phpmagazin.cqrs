<?php
namespace PizzaChange\Entity;

use Zend\Filter\StaticFilter;

class ToppingEntity implements ToppingEntityInterface
{
    protected $id;
    protected $timestamp;
    protected $title;
    protected $price;

    public function getId()
    {
        return $this->id;
    }

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

    public function setPrice($price)
    {
        $this->price = (integer)$price;
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
                $array[$key] = $this->$key;
            }
        }

        return $array;
    }
}
