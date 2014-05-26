<?php
namespace Clearvox\Aastra\XML\Command;

class Dial implements CommandInterface
{
    /**
     * @var int
     */
    private $number;

    /**
     * Specify a number for this Dial command
     *
     * @param int $number
     */
    public function __construct($number)
    {
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
        return "Dial:{$this->number}";
    }

}