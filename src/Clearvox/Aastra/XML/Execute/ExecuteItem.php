<?php
namespace Clearvox\Aastra\XML\Execute;

use Clearvox\Aastra\XML\Command\CommandInterface;
use Clearvox\Aastra\XML\XMLObjectInterface;

/**
 * The child XML of ExecuteItem to go inside the Execute
 * class.
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML\Execute
 * @author Leon Rowland <leon@rowland.nl>
 */
class ExecuteItem implements XMLObjectInterface
{
    /**
     * @var \Clearvox\Aastra\XML\Command\CommandInterface
     */
    private $command;

    /**
     * @var bool
     */
    private $interrupt;

    public function __construct(CommandInterface $command)
    {
        $this->command = $command;
    }

    /**
     * If this ExecuteItem has a Dial command, if an existing
     * call is in progress then put it on hold.
     *
     * @return $this
     */
    public function dontInterrupt()
    {
        $this->interrupt = false;
        return $this;
    }

    /**
     * Returns the DOMElement that the implemented
     * class represents.
     *
     * @return \DOMElement
     */
    public function generate()
    {
        $tempDOM = new \DOMDocument();
        $item = $tempDOM->createElement('ExecuteItem');

        $item->setAttribute('URI', (string) $this->command);

        if (false === $this->interrupt) {
            $item->setAttribute('interruptCall', 'no');
        }

        unset($tempDOM);
        return $item;
    }
}