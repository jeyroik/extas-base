<?php
namespace extas\components;

use extas\interfaces\IHasValue;

/**
 * Trait THasValue
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasValue
{
    /**
     * @param mixed $default
     *
     * @return mixed
     */
    public function getValue($default = null)
    {
        $value = $this->config[IHasValue::FIELD__VALUE] ?? $default;

        if (method_exists($this, 'getTemplateName')) {
            $templateName = $this->getTemplateName();
            /**
             * For example: extas.parameter.string.value.get
             */
            $stage = $this::SUBJECT . '.' . $templateName . '.value.get';
            foreach ($this->getPluginsByStage($stage) as $plugin) {
                $plugin($this, $value);
            }
        }

        return $value;
    }

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        if (method_exists($this, 'getTemplateName')) {
            $templateName = $this->getTemplateName();
            /**
             * For example: extas.parameter.string.value.set
             */
            $stage = $this::SUBJECT . '.' . $templateName . '.value.set';
            foreach ($this->getPluginsByStage($stage) as $plugin) {
                $plugin($this, $value);
            }
        }

        $this->config[IHasValue::FIELD__VALUE] = $value;

        return $this;
    }
}
