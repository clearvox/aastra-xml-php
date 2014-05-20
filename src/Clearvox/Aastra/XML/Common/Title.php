<?php
namespace Clearvox\Aastra\XML\Common;

use Clearvox\Aastra\XML\Common\Attribute as Attributes;
use Clearvox\Aastra\XML\XMLObjectInterface;

class Title implements XMLObjectInterface
{
    use Attributes\Color;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var bool
     */
    protected $wrap;

    public function __construct($title)
    {
        $this->title = $title;
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

        // Make the title, add the content
        $title = $tempDOM->createElement('Title');
        $title->appendChild($tempDOM->createTextNode($this->title));

        if (true === $this->wrap) {
            $title->setAttribute('Wrap', 'yes');
        }

        if (isset($this->color)) {
            $title->setAttribute('Color', $this->color);
        }

        unset($tempDOM);
        return $title;
    }

}