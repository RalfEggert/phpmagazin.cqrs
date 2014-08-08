<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaChange
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaChange\Entity;

use Zend\Filter\StaticFilter;

/**
 * Class ToppingEntity
 *
 * @package PizzaChange
 */
class ToppingEntity implements ToppingEntityInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $price;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = (integer)$id;
    }

    /**
     * @param string $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = (string)$timestamp;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = (string)$title;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = (integer)$price;
    }

    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     *
     * @return void
     */
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

    /**
     * Return an array representation of the object
     *
     * @return array
     */
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