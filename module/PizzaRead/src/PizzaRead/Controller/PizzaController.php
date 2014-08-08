<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaRead
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaRead\Controller;

use PizzaRead\Repository\PizzaRepositoryInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class PizzaController
 *
 * @package PizzaRead
 */
class PizzaController extends AbstractRestfulController
{
    /**
     * @var PizzaRepositoryInterface
     */
    protected $pizzaRepository;

    /**
     * @param \PizzaRead\Repository\PizzaRepositoryInterface $pizzaRepository
     */
    public function setPizzaRepository(
        PizzaRepositoryInterface $pizzaRepository
    ) {
        $this->pizzaRepository = $pizzaRepository;
    }

    /**
     * @return \PizzaRead\Repository\PizzaRepositoryInterface
     */
    public function getPizzaRepository()
    {
        return $this->pizzaRepository;
    }

    /**
     * Handle GET requests with no additional id parameter
     *
     * @return JsonModel
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
     * @param int $id
     *
     * @return JsonModel
     */
    public function get($id)
    {
        return new JsonModel(
            array(
                $this->getPizzaRepository()->fetchPizzaById((integer)$id)
            )
        );
    }

    /**
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function create($data)
    {
        return new JsonModel(parent::create($data));
    }

    /**
     * @param mixed $id
     *
     * @return JsonModel
     */
    public function delete($id)
    {
        return new JsonModel(parent::delete($id));
    }

    /**
     * @return JsonModel
     */
    public function deleteList()
    {
        return new JsonModel(parent::deleteList());
    }

    /**
     * @param null $id
     *
     * @return JsonModel
     */
    public function head($id = null)
    {
        return new JsonModel(parent::head($id));
    }

    /**
     * @return JsonModel
     */
    public function options()
    {
        return new JsonModel(parent::options());
    }

    /**
     * @param $id
     * @param $data
     *
     * @return JsonModel
     */
    public function patch($id, $data)
    {
        return new JsonModel(parent::patch($id, $data));
    }

    /**
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function replaceList($data)
    {
        return new JsonModel(parent::replaceList($data));
    }

    /**
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function patchList($data)
    {
        return new JsonModel(parent::patchList($data));
    }

    /**
     * @param mixed $id
     * @param mixed $data
     *
     * @return JsonModel
     */
    public function update($id, $data)
    {
        return new JsonModel(parent::update($id, $data));
    }
}