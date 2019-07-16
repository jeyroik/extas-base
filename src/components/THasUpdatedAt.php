<?php
namespace extas\components;

use extas\interfaces\IHasUpdatedAt;

/**
 * Trait THasUpdatedAt
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasUpdatedAt
{
    /**
     * @param string $format
     *
     * @return string|int
     */
    public function getUpdatedAt(string $format = '')
    {
        $time = $this->config[IHasUpdatedAt::FIELD__UPDATED_AT] ?? 0;

        return $format ? date($format, $time) : $time;
    }

    /**
     * @param string|int|\DateTime $time
     *
     * @return $this
     */
    public function setUpdatedAt($time)
    {
        if ($time instanceof \DateTime) {
            $time = $time->getTimestamp();
        } elseif (is_numeric($time)) {
            $time = (int) $time;
        } else {
            $time = strtotime($time);
        }

        $this->config[IHasUpdatedAt::FIELD__UPDATED_AT] = $time;

        return $this;
    }
}
