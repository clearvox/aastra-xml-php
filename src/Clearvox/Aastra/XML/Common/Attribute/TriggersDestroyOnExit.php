<?php
namespace Clearvox\Aastra\XML\Common\Attribute;

/**
 * Trait TriggersDestroyOnExit
 *
 * Will trigger the destroyOnExit on the currently shown
 * UI XML Object if it has destroyOnExit() set.
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML\Common\Attribute
 */
trait TriggersDestroyOnExit
{
    protected $triggerDestroyOnExit;

    public function triggerDestroyOnExit()
    {
        $this->triggerDestroyOnExit = true;
        return $this;
    }
}