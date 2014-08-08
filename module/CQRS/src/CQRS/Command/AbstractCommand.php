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
 * Class CreateToppingCommand
 *
 * @package CQRS
 */
abstract class AbstractCommand implements CommandInterface
{
    /**
     * Command name
     */
    const NAME = null;

    /**
     * @var CommandResultInterface
     */
    protected $result;

    /**
     * @return string
     */
    public function getCommandName()
    {
        return static::NAME;
    }

    /**
     * @param CommandResultInterface $result
     */
    public function setResult(CommandResultInterface $result)
    {
        $this->result = $result;
    }

    /**
     * @return CommandResultInterface
     */
    public function getResult()
    {
        return $this->result;
    }
}