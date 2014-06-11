<?php
namespace Clearvox\Aastra\XML\Common\Attribute;

trait DestroyOnExit
{
    /**
     * @var bool
     */
    protected $destroyOnExit;

    /**
     * Specifies that the object is not to be kept in the display
     * on exit.  Also allows other objects with the
     * TriggerDestroyOnExit trait to force close the XML object
     * that has this set.
     *
     * @return $this
     */
    public function destroyOnExit()
    {
        $this->destroyOnExit = true;
        return $this;
    }
}