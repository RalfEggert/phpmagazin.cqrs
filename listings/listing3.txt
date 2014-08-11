<?php
namespace MongoDB\Collection;

use MongoCollection;
use MongoDB;

abstract class AbstractCollection implements CollectionInterface
{
    protected $collection = null;

    protected $collectionName = null;

    public function __construct(MongoDB $adapter)
    {
        $this->setCollection($adapter, $this->collectionName);
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function setCollection(MongoDB $adapter, $collectionName = null)
    {
        $this->collection = $adapter->$collectionName;

        return $this;
    }

    public function fetchList()
    {
        $resultSet = array();

        foreach ($this->getCollection()->find() as $resultRow) {
            unset($resultRow['_id']);

            $resultSet[] = $resultRow;
        }

        return $resultSet;
    }

    public function fetchSingleById($id)
    {
        $resultRow = $this->getCollection()->findOne(array('id' => $id));

        if (is_null($resultRow)) {
            return false;
        }

        unset($resultRow['_id']);

        return $resultRow;
    }
}

