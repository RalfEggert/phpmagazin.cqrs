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

use MongoId;

/**
 * Topping collection
 *
 * Collection to represent a topping
 *
 * @package    PizzaCli
 */
interface ToppingCollectionInterface
{
    /**
     * Fetch mongo id by topping id
     *
     * @param int $id id of topping
     *
     * @return
     */
    public function fetchMongoIdByToppingId($id);

    /**
     * Insert entity
     *
     * @param array $insertData
     *
     * @return string
     */
    public function insert(array $insertData);

    /**
     * Update topping
     *
     * @param array   $updateData
     * @param MongoId $mongoId
     *
     * @return string
     */
    public function update(array $updateData, MongoId $mongoId);

    /**
     * Delete topping
     *
     * @param MongoId $mongoId
     *
     * @return string
     */
    public function delete(MongoId $mongoId);
}