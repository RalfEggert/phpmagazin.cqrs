<?php
/**
 * phpmagazin.cqrs
 */
namespace PizzaCli\Collection;

use MongoId;


/**
 * Pizza collection
 *
 * Collection to represent a pizza
 *
 * @package    PizzaCli
 */
interface PizzaCollectionInterface
{
    /**
     * Fetch mongo id by pizza id
     *
     * @param int $id id of pizza
     *
     * @return MongoId
     */
    public function fetchMongoIdByPizzaId($id);

    /**
     * Insert pizza
     *
     * @param array $insertData
     *
     * @return string
     */
    public function insert(array $insertData);

    /**
     * Update pizza
     *
     * @param array   $updateData
     * @param MongoId $mongoId
     *
     * @return string
     */
    public function update(array $updateData, MongoId $mongoId);

    /**
     * Delete pizza
     *
     * @param MongoId $mongoId
     *
     * @return string
     */
    public function delete(MongoId $mongoId);
}