<?php
namespace Clearvox\Aastra\XML\Common\Attribute;

trait GoodbyeLockInURI
{
    /**
     * @var string
     */
    protected $goodbyeLockInURI;

    /**
     * Defines the URI to be called when the Goodbye key is pressed during
     * the locked XML session. This URI overrides the native behaviour of
     * the Goodbye key which is to destroy the current XML object
     * displayed.
     *
     * @param string $goodbyeLockInURI
     * @return $this
     */
    public function setGoodbyeLockInURI($goodbyeLockInURI)
    {
        $this->goodbyeLockInURI = $goodbyeLockInURI;
        return $this;
    }
}