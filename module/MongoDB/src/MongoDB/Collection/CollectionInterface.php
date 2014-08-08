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
interface CollectionInterface
{
    /**
     * Get collection
     *
     * @return MongoCollection
     */
    public function getCollection();

    /**
     * Constructor
     *
     * @param MongoDb $adapter
     */
    public function __construct(MongoDB $adapter);

    /**
     * Set collection
     *
     * @param MongoDB $adapter
     * @param string  $collectionName
     *
     * @return $this
     */
    public function setCollection(MongoDB $adapter, $collectionName = null);

    /**
     * Fetch single data set by id
     *
     * @param int $id id of data set
     *
     * @return array
     */
    public function fetchSingleById($id);

    /**
     * Fetch list of data sets
     *
     * @return array
     */
    public function fetchList();
}