<?php
namespace PizzaCli\Collection;

use MongoDB;
use MongoDB\Collection\AbstractCollection;
use MongoId;

class PizzaCollection extends AbstractCollection
    implements PizzaCollectionInterface
{
    protected $collectionName = 'pizzas';

    public function fetchMongoIdByPizzaId($id)
    {
        $resultRow = $this->getCollection()->findOne(array('id' => $id));

        if (is_null($resultRow)) {
            return false;
        }

        return $resultRow['_id'];
    }

    public function insert(array $insertData)
    {
        $mongoId = new MongoId();

        $insertData['_id'] = $mongoId;

        $this->getCollection()->insert($insertData);

        return (string)$mongoId;
    }

    public function update(array $updateData, MongoId $mongoId)
    {
        $searchCriteria = array('_id' => $mongoId);

        $this->getCollection()->update($searchCriteria, $updateData);

        return (string)$mongoId;
    }

    public function delete(MongoId $mongoId)
    {
        $searchCriteria = array('_id' => $mongoId);

        $this->getCollection()->remove($searchCriteria);

        return (string)$mongoId;
    }
}

