<?php
namespace CQRS\Command;

abstract class AbstractCommand implements CommandInterface
{
    const NAME = null;

    protected $result;

    public function getCommandName()
    {
        return static::NAME;
    }

    public function setResult(CommandResultInterface $result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }
}
