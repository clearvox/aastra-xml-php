<?php
namespace Clearvox\Aastra\XML\Status;

use Clearvox\Aastra\XML\Common\Attribute as Attributes;
use Clearvox\Aastra\XML\XMLObjectInterface;

/**
 * Class Message
 *
 * Specify a Message to send with an AastraIPPhoneStatus XML object. (Status class)
 * and show it on the screen.
 *
 * If you wish to clear the message, you can call the clear() method, even after
 * the Message has been added to the Status object.
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML\Status
 * @author Leon Rowland <leon@rowland.nl>
 */
class Message implements XMLObjectInterface
{
    // Attributes
    use Attributes\Color;

    /**
     * @var integer
     */
    protected $index;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var bool
     */
    protected $clear;

    /**
     * @var bool
     */
    protected $alert;

    /**
     * @var int
     */
    protected $timeout;

    /**
     * Specify a new Message for the Status class.
     *
     * @param string $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Specifically set the index in the Message.
     *
     * @param int $index
     * @return $this
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }

    /**
     * URI to be called when the user presses the message button on the
     * idle screen
     *
     * @model 6739i
     * @return $this
     */
    public function setURI($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * Specify the timeout for this alert message. If the timeout
     * value is specifically set to NULL then the alert message
     * stays forever. EVEN IF YOU SUPPLY THE CLEAR COMMAND!
     *
     * @param integer|null $timeout
     * @return $this
     */
    public function isAlert($timeout = null)
    {
        $this->alert = true;
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * This will clear the message in the response. Removing it
     * from the display.
     *
     * @return $this
     */
    public function clear()
    {
        $this->clear = true;
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
        $message = $tempDOM->createElement('Message');

        if (isset($this->index)) {
            $message->setAttribute('index', $this->index);
        }

        if (isset($this->color)) {
            $message->setAttribute('Color', $this->color);
        }

        if (true === $this->alert) {
            $message->setAttribute('type', 'alert');

            if (isset($this->timeout)) {
                $message->setAttribute('Timeout', $this->timeout);
            }
        }

        if (isset($this->uri)) {
            $message->setAttribute('URI', $this->uri);
        }

        $content = (true !== $this->clear) ? $this->message : null;

        $message->appendChild($tempDOM->createTextNode($content));

        unset($tempDOM);
        return $message;
    }
}