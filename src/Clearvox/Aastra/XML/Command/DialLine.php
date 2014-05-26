<?php
namespace Clearvox\Aastra\XML\Command;

class DialLine implements CommandInterface
{
    /**
     * @var int
     */
    private $line;

    /**
     * @var int
     */
    private $number;

    public function __construct($line, $number)
    {
        $this->line   = $line;
        $this->number = $number;
    }

    /**
     * Turn the implemented Command into the required string for
     * URI components.
     *
     * @return string
     */
    public function __toString()
    {
        return "DialLine:{$this->line}:{$this->number}";
    }

}