<?php
namespace extas\interfaces;

/**
 * Interface IHasUpdatedAt
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasUpdatedAt
{
    const FIELD__UPDATED_AT = 'updated_at';

    /**
     * @param string $format
     *
     * @return string|int
     */
    public function getUpdatedAt(string $format = '');

    /**
     * @param string|int|\DateTime $time
     * @return $this
     */
    public function setUpdatedAt($time);
}
