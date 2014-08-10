<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    PizzaCli
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaCli\Collection;

use MongoDB;
use MongoDB\Collection\AbstractCollection;
use MongoId;

/**
 * Pizza collection
 *
 * Collection to represent a pizza
 *
 * @package    PizzaCli
 */
class PizzaCollection extends AbstractCollection
    implements PizzaCollectionInterface
{
    /**
     * @var string
     */
    protected $collectionName = 'pizzas';

    /**
     * Fetch mongo id by pizza id
     *
     * @param int $id id of pizza
     *
     * @return MongoId
     */
    public function fetchMongoIdByPizzaId($id)
    {
        $resultRow = $this->getCollection()->findOne(array('id' => $id));

        if (is_null($resultRow)) {
            return false;
        }

        return $resultRow['_id'];
    }

    /**
     * Insert pizza
     *
     * @param array $insertData
     *
     * @return string
     */
    public function insert(array $insertData)
    {
        $mongoId = new MongoId();

        $insertData['_id'] = $mongoId;

        $this->getCollection()->insert($insertData);

        return (string)$mongoId;
    }

    /**
     * Update pizza
     *
     * @param array   $updateData
     * @param MongoId $mongoId
     *
     * @return string
     */
    public function update(array $updateData, MongoId $mongoId)
    {
        $searchCriteria = array('_id' => $mongoId);

        $this->getCollection()->update($searchCriteria, $updateData);

        return (string)$mongoId;
    }

    /**
     * Delete pizza
     *
     * @param MongoId $mongoId
     *
     * @return string
     */
    public function delete(MongoId $mongoId)
    {
        $searchCriteria = array('_id' => $mongoId);

        $this->getCollection()->remove($searchCriteria);

        return (string)$mongoId;
    }
}
