<?php
namespace Clearvox\Aastra\XML\Key;

/**
 * Represents the name of the URI component for Aastra
 * Services Key.
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML\Key
 * @author Leon Rowland <leon@rowland.nl>
 */
class Services implements KeyInterface
{
    public function __toString()
    {
        return 'Key:Services';
    }
}