<?php
namespace Clearvox\Aastra\XML\Key;

/**
 * Implement this interface to ensure that the represented keys used
 * in URI components of the XML.
 *
 * Each implemented class should just be used as a string value.
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML\Key
 * @author Leon Rowland <leon@rowland.nl>
 */
interface KeyInterface
{
    public function __toString();
}