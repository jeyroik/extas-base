<?php
namespace extas\components;

use extas\interfaces\IHasCreatedAt;

/**
 * Trait THasCreatedAt
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasCreatedAt
{
    /**
     * @param string $format
     *
     * @return string|int
     */
    public function getCreatedAt(string $format = '')
    {
        $time = $this->config[IHasCreatedAt::FIELD__CREATED_AT] ?? 0;

        return $format ? date($format, $time) : $time;
    }

    /**
     * @param string|int|\DateTime $time
     *
     * @return $this
     */
    public function setCreatedAt($time)
    {
        if ($time instanceof \DateTime) {
            $time = $time->getTimestamp();
        } elseif (is_numeric($time)) {
            $time = (int) $time;
        } else {
            $time = strtotime($time);
        }

        $this->config[IHasCreatedAt::FIELD__CREATED_AT] = $time;

        return $this;
    }
}
