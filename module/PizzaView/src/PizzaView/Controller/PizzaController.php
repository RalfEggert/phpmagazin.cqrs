<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaView
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaView\Controller;

use PizzaView\Repository\PizzaRepositoryInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class PizzaController
 *
 * @package PizzaView
 */
class PizzaController extends AbstractRestfulController
{
    /**
     * @var PizzaRepositoryInterface
     */
    protected $pizzaRepository;

    /**
     * @param \PizzaView\Repository\PizzaRepositoryInterface $pizzaRepository
     */
    public function setPizzaRepository(PizzaRepositoryInterface $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    /**
     * @return \PizzaView\Repository\PizzaRepositoryInterface
     */
    public function getPizzaRepository()
    {
        return $this->pizzaRepository;
    }

    /**
     * Handle GET requests with no additional id parameter
     *
     * @return \Zend\View\Model\JsonModel
     */
    public function getList()
    {
        return new JsonModel(
            array(
                $this->getPizzaRepository()->fetchPizzas()
            )
        );
    }

    /**
     * Handle GET requests with additional id parameter
     *
     * @param integer $id
     *
     * @return \Zend\View\Model\JsonModel
     */
    public function get($id)
    {
        return new JsonModel(
            array(
                $this->getPizzaRepository()->fetchPizzaById((integer) $id)
            )
        );
    }


}