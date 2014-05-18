<?php
namespace Clearvox\Aastra\XML;

/**
 * Interface XMLObjectInterface
 *
 * Implement this interface for each component of the XML
 * for Aastra
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML
 * @author Leon Rowland <leon@rowland.nl>
 */
interface XMLObjectInterface
{
    /**
     * Returns the DOMElement that the implemented
     * class represents.
     *
     * @return \DOMElement
     */
    public function generate();
}