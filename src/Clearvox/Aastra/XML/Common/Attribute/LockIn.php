<?php
namespace Clearvox\Aastra\XML\Common\Attribute;

trait LockIn
{
    /**
     * @var bool
     */
    protected $lockIn;

    /**
     * The phone will ignore all events that would cause the screen
     * to exit without using the keys defined by the object.
     *
     * @return $this
     */
    public function lockIn()
    {
        $this->lockIn = true;
        return $this;
    }
}