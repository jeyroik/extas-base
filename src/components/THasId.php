<?php
namespace extas\components;

use extas\interfaces\IHasId;

/**
 * Trait THasId
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasId
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->config[IHasId::FIELD__ID] ?? '';
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setId($name)
    {
        $this->config[IHasId::FIELD__ID] = $name;

        return $this;
    }
}
