<?php
namespace Clearvox\Aastra\XML\Key;

/**
 * Represents the name of the URI component for Aastra
 * Save Key.
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML\Key
 * @author Leon Rowland <leon@rowland.nl>
 */
class Save implements KeyInterface
{
    public function __toString()
    {
        return 'Key:Save';
    }
}