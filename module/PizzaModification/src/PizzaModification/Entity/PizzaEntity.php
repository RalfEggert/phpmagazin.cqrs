<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaModification
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaModification\Entity;

use PizzaModification\Collection\ToppingCollectionInterface;
use Zend\Filter\StaticFilter;

/**
 * Class PizzaEntity
 *
 * @package PizzaModification\Entity
 */
class PizzaEntity implements PizzaEntityInterface
{
    /**
     * @var integer
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
     * @var string
     */
    protected $description;

    /**
     * @var integer
     */
    protected $price;

    /**
     * @var ToppingCollectionInterface
     */
    protected $toppings;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = (integer) $id;
    }

    /**
     * @param string $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = (string) $timestamp;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = (string) $title;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = (string) $description;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = (integer) $price;
    }

    /**
     * @param ToppingCollectionInterface $toppings
     */
    public function setToppings(ToppingCollectionInterface $toppings)
    {
        $this->toppings = $toppings;
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