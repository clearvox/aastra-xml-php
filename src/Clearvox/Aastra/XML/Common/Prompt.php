<?php
namespace Clearvox\Aastra\XML\Common;

use Clearvox\Aastra\XML\Common\Attribute\Color\ColorInterface;
use Clearvox\Aastra\XML\XMLObjectInterface;

class Prompt implements XMLObjectInterface
{
    protected $prompt;

    protected $color;

    public function __construct($prompt)
    {
        $this->prompt = $prompt;
    }

    public function setColor(ColorInterface $color)
    {
        $this->color = $color->getName();
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

        // Create prompt element
        $prompt = $tempDOM->createElement('Prompt');
        $prompt->appendChild($tempDOM->createTextNode($this->prompt));

        if (isset($this->color)) {
            $prompt->setAttribute('Color', $this->color);
        }

        unset($tempDOM);
        return $prompt;
    }

}