<?php
namespace PizzaRead\Controller;

use PizzaRead\Repository\PizzaRepositoryInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class PizzaController extends AbstractRestfulController
{
    protected $pizzaRepository;

    public function setPizzaRepository(
        PizzaRepositoryInterface $pizzaRepository
    ) {
        $this->pizzaRepository = $pizzaRepository;
    }

    public function getPizzaRepository()
    {
        return $this->pizzaRepository;
    }

    public function getList()
    {
        return new JsonModel(
            array(
                $this->getPizzaRepository()->fetchPizzas()
            )
        );
    }

    public function get($id)
    {
        return new JsonModel(
            array(
                $this->getPizzaRepository()->fetchPizzaById((integer)$id)
            )
        );
    }

    public function create($data)
    {
        return new JsonModel(parent::create($data));
    }

    public function delete($id)
    {
        return new JsonModel(parent::delete($id));
    }

    public function deleteList()
    {
        return new JsonModel(parent::deleteList());
    }

    public function head($id = null)
    {
        return new JsonModel(parent::head($id));
    }

    public function options()
    {
        return new JsonModel(parent::options());
    }

    public function patch($id, $data)
    {
        return new JsonModel(parent::patch($id, $data));
    }

    public function replaceList($data)
    {
        return new JsonModel(parent::replaceList($data));
    }

    public function patchList($data)
    {
        return new JsonModel(parent::patchList($data));
    }

    public function update($id, $data)
    {
        return new JsonModel(parent::update($id, $data));
    }
}
