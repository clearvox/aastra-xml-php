<?php
namespace Clearvox\Aastra\XML\Key;

/**
 * Represents the name of the URI component for Aastra
 * Delete Key.
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML\Key
 * @author Leon Rowland <leon@rowland.nl>
 */
class Delete implements KeyInterface
{
    public function __toString()
    {
        return 'Key:Delete';
    }
}