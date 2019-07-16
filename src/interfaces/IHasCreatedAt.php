<?php
namespace extas\interfaces;

/**
 * Interface IHasCreatedAt
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasCreatedAt
{
    const FIELD__CREATED_AT = 'created_at';

    /**
     * @param string $format
     *
     * @return string|int
     */
    public function getCreatedAt(string $format = '');

    /**
     * @param string|int|\DateTime $time
     * @return $this
     */
    public function setCreatedAt($time);
}
