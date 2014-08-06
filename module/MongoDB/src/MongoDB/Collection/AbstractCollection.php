<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    MongoDB
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace MongoDB\Collection;

use MongoCollection;
use MongoDB;

/**
 * Abstract collection
 *
 * Collection to represent a dataset
 *
 * @package    MongoDB
 */
abstract class AbstractCollection implements CollectionInterface
{
    /**
     * @var MongoCollection
     */
    protected $collection = null;

    /**
     * @var string
     */
    protected $collectionName = null;

    /**
     * Constructor
     *
     * @param MongoDb $adapter
     */
    public function __construct(MongoDB $adapter)
    {
        $this->setCollection($adapter, $this->collectionName);
    }

    /**
     * Get collection
     *
     * @return MongoCollection
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set collection
     *
     * @param MongoDB $adapter
     * @param string  $collectionName
     *
     * @return $this
     */
    public function setCollection(MongoDB $adapter, $collectionName = null)
    {
        $this->collection = $adapter->$collectionName;

        return $this;
    }

    /**
     * Fetch list of data sets
     *
     * @return array
     */
    public function fetchList()
    {
        $resultSet = array();

        foreach ($this->getCollection()->find() as $resultRow) {
            unset($resultRow['_id']);

            $resultSet[] = $resultRow;
        }

        return $resultSet;
    }

    /**
     * Fetch single data set by id
     *
     * @param int $id id of data set
     *
     * @return array
     */
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
