<?php
namespace Clearvox\Aastra\XML\Key;

/**
 * Represents the name of the URI component for Aastra
 * Intercom Key.
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML\Key
 * @author Leon Rowland <leon@rowland.nl>
 */
class Intercom implements KeyInterface
{
    public function __toString()
    {
        return 'Key:Intercom';
    }
}