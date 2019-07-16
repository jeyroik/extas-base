<?php
namespace extas\components\parameters;

use extas\components\templates\THasTemplate;
use extas\components\THasName;
use extas\components\THasValue;
use extas\interfaces\parameters\IParameter;
use extas\components\Item;

/**
 * Class Parameter
 *
 * @package extas\components\parameters
 * @author jeyroik@gmail.com
 */
class Parameter extends Item implements IParameter
{
    use THasName;
    use THasValue;
    use THasTemplate;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'extas.parameter';
    }
}
