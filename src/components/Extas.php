<?php
namespace extas\components;

use extas\interfaces\IExtas;

/**
 * Class Extas
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
class Extas extends Item implements IExtas
{
    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
