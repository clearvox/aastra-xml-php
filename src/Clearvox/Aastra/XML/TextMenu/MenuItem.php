<?php
namespace Clearvox\Aastra\XML\TextMenu;

use Clearvox\Aastra\XML\XMLObjectInterface;
use Clearvox\Aastra\XML\Common\Prompt;

class MenuItem implements XMLObjectInterface
{
    /**
     * @var string
     */
    protected $base;

    /**
     * @var \DOMNode
     */
    protected $prompt;

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var integer
     */
    protected $dialNumber;

    /**
     * @var integer
     */
    protected $dialLine;

    public function __construct($base = null)
    {
        if ( ! is_null($base)) {
            $this->base = $base;
        }
    }

    /**
     * The passed in parameter is prepended to the
     * value in the URI tags.
     *
     * @param string $uri
     * @return $this
     */
    public function setBase($uri)
    {
        $this->base = $uri;
        return $this;
    }

    /**
     * Label of the MenuItem
     *
     * @param Prompt $prompt
     * @return $this
     */
    public function setPrompt(Prompt $prompt)
    {
        $this->prompt = $prompt->generate();
        return $this;
    }

    /**
     * URI to be used if the user presses Select
     * with the cursor on this item.
     *
     * @param string $uri
     * @return $this
     */
    public function setURI($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * Defines what number to be dialed when an offhook
     * action is performed on the Phone, or if the Dial2
     * custom softkey is pressed.
     *
     * @param int $number
     * @param null|int $line
     * @return $this
     */
    public function setDial($number, $line = null)
    {
        $this->dialNumber = $number;
        $this->dialLine   = $line;
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
        $menuItem = $tempDOM->createElement('MenuItem');

        if (isset($this->base)) {
            $menuItem->setAttribute('base', $this->base);
        }

        if (isset($this->prompt)) {
            $menuItem->appendChild($tempDOM->importNode($this->prompt, true));
        }

        if (isset($this->uri)) {
            $uri = $tempDOM->createElement('URI');
            $uri->appendChild($tempDOM->createTextNode($this->uri));
            $menuItem->appendChild($uri);
        }

        if (isset($this->dialNumber)) {
            $dial = $tempDOM->createElement('Dial');
            $dial->appendChild($tempDOM->createTextNode($this->dialNumber));

            if (isset($this->dialLine)) {
                $dial->setAttribute('line', $this->dialLine);
            }

            $menuItem->appendChild($dial);
        }

        unset($tempDOM);
        return $menuItem;
    }
}