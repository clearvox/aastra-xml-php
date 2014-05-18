<?php
namespace Clearvox\Aastra\XML\Common;

use Clearvox\Aastra\XML\Common\Attribute\Color\ColorInterface;
use Clearvox\Aastra\XML\XMLObjectInterface;

class Title implements XMLObjectInterface
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var bool
     */
    protected $wrap;

    /**
     * @var string
     */
    protected $color;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function setColor(ColorInterface $color)
    {
        $this->color = $color->getName();
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