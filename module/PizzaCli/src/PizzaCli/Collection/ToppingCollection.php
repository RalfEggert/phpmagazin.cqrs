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

use MongoDB\Collection\AbstractCollection;
use MongoDB;
use MongoId;

/**
 * Topping collection
 *
 * Collection to represent a topping
 *
 * @package    PizzaCli
 */
class ToppingCollection extends AbstractCollection
    implements ToppingCollectionInterface
{
    /**
     * @var string
     */
    protected $collectionName = 'toppings';

    /**
     * Fetch mongo id by topping id
     *
     * @param int $id id of topping
     *
     * @return MongoId
     */
    public function fetchMongoIdByToppingId($id)
    {
        $resultRow = $this->getCollection()->findOne(array('id' => $id));

        if (is_null($resultRow)) {
            return false;
        }

        return $resultRow['_id'];
    }

    /**
     * Insert topping
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
     * Update topping
     *
     * @param array $updateData
     * @param MongoId $mongoId
     *
     * @return string
     */
    public function update(array $updateData, MongoId $mongoId)
    {
        $searchCriteria = array('_id' => $mongoId);

        $this->getCollection()->update($searchCriteria, $updateData);

        return (string) $mongoId;
    }

    /**
     * Delete topping
     *
     * @param MongoId $mongoId
     *
     * @return string
     */
    public function delete(MongoId $mongoId)
    {
        $searchCriteria = array('_id' => $mongoId);

        $this->getCollection()->remove($searchCriteria);

        return (string) $mongoId;
    }
}
