<?php
namespace Clearvox\Aastra\XML\Common\Attribute;

/**
 * Timeout Trait
 *
 * The XML object has a lifespan
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML|Common|Attribute
 * @author Leon Rowland <leon@rowland.nl>
 */
trait Timeout
{
    /**
     * @var integer
     */
    protected $timeout;

    /**
     * Sets a Timeout for the XML object. Set to 0 overrides
     * the timeout.
     *
     * @param int $seconds
     * @return $this
     */
    public function setTimeout($seconds)
    {
        $this->timeout = $seconds;
        return $this;
    }
}