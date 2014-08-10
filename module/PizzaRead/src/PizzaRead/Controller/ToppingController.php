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

use PizzaRead\Repository\ToppingRepositoryInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class ToppingController
 *
 * @package PizzaRead
 */
class ToppingController extends AbstractRestfulController
{
    /**
     * @var ToppingRepositoryInterface
     */
    protected $toppingRepository;

    /**
     * @param ToppingRepositoryInterface $toppingRepository
     */
    public function setToppingRepository(
        ToppingRepositoryInterface $toppingRepository
    ) {
        $this->toppingRepository = $toppingRepository;
    }

    /**
     * @return ToppingRepositoryInterface
     */
    public function getToppingRepository()
    {
        return $this->toppingRepository;
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
                $this->getToppingRepository()->fetchToppings()
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
                $this->getToppingRepository()->fetchToppingById((integer)$id)
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