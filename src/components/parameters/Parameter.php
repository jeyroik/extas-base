<?php
namespace extas\components\parameters;

use extas\components\SystemContainer;
use extas\components\templates\THasTemplate;
use extas\components\THasName;
use extas\components\THasValue;
use extas\interfaces\parameters\IParameter;
use extas\components\Item;
use extas\interfaces\parameters\templates\IParameterTemplateRepository;

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
     * @return \extas\interfaces\repositories\IRepository|string
     */
    public function getTemplateRepository()
    {
        return SystemContainer::getItem(IParameterTemplateRepository::class);
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'extas.parameter';
    }
}
