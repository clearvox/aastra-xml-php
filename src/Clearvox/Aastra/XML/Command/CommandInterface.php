<?php
namespace Clearvox\Aastra\XML\Command;

/**
 * Commands for usage inside URI instances (for example found within
 * the AastraIPPhoneExecute XML Object) should implement this
 * interface.
 *
 * @package Clearvox\Aastra\XML\Command
 */
interface CommandInterface
{
    /**
     * Turn the implemented Command into the required string for
     * URI components.
     *
     * @return string
     */
    public function __toString();
}