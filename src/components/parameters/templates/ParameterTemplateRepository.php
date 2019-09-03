<?php
namespace extas\components\parameters\templates;

use extas\components\repositories\Repository;
use extas\components\templates\Template;
use extas\interfaces\parameters\templates\IParameterTemplateRepository;

/**
 * Class ParameterTemplateRepository
 *
 * @package extas\components\parameters
 * @author jeyroik@gmail.com
 */
class ParameterTemplateRepository extends Repository implements IParameterTemplateRepository
{
    protected $itemClass = Template::class;
    protected $name = 'parameters_templates';
    protected $pk = Template::FIELD__NAME;
    protected $scope = 'extas';
    protected $idAs = '';
}
