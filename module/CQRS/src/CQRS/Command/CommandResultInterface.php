<?php
/**
 * Zend Framework 2 - PHP-Magazin CQRS
 *
 * Beispiele für ZF2 & CQRS
 *
 * @package    CQRS
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace CQRS\Command;

/**
 * Class CommandResult
 *
 * @package CQRS
 */
interface CommandResultInterface
{
    /**
     * @param boolean $success
     */
    public function setSuccess($success);

    /**
     * @return boolean
     */
    public function getSuccess();

    /**
     * @param array $data
     */
    public function setData(array $data);

    /**
     * @return array
     */
    public function getData();
}