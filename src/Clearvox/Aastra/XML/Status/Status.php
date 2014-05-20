<?php
namespace Clearvox\Aastra\XML\Status;

use Clearvox\Aastra\XML\Common\Attribute as Attributes;
use Clearvox\Aastra\XML\XMLObjectInterface;

/**
 * AastraIPPhoneStatus Object.
 *
 * @uses \Clearvox\Aastra\XML\Common\Attribute\Beep
 * @uses \Clearvox\Aastra\XML\Common\Attribute\TriggerDestroyOnExit
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML\Status
 * @author Leon Rowland <leon@rowland.nl>
 */
class Status implements XMLObjectInterface
{
    use Attributes\Beep;
    use Attributes\TriggerDestroyOnExit;

    /**
     * @var string
     */
    protected $sessionID;

    /**
     * @var array
     */
    protected $messages = array();

    /**
     * Set a specific sessionID to group these messages under. You then send a blank
     * Status with the same sessionID to clear the messages.
     *
     * @param string $sessionID
     */
    public function __construct($sessionID)
    {
        $this->sessionID = $sessionID;
    }

    /**
     * Adds a Message to be displayed. Can be supplied a specific
     * instance or will generate one.
     *
     * @param Message $message
     * @return $this
     */
    public function addMessage(Message $message, $index = null)
    {
        if ( ! is_null($index)) {
            $this->messages[$index] = $message;
        } else {
            $this->messages[] = $message;
        }

        return $this;
    }

    /**
     * Make the AastraIPPhoneStatus XML object.
     *
     * @return \DOMElement
     */
    public function generate()
    {
        $tempDOM = new \DOMDocument();
        $status = $tempDOM->createElement('AastraIPPhoneStatus');

        if (true === $this->beep) {
            $status->setAttribute('Beep', 'yes');
        }

        if (true === $this->triggerDestroyOnExit) {
            $status->setAttribute('triggerDestroyOnExit', 'yes');
        }

        // Session Element
        $session = $tempDOM->createElement('Session');
        $session->appendChild($tempDOM->createTextNode($this->sessionID));

        // Add Session element to AastraIPPhoneStatus
        $status->appendChild($session);

        foreach ($this->messages as $index => $message) {
            // Override the messages index from here
            $message->setIndex($index);
            $status->appendChild($tempDOM->importNode($message->generate(), true));
        }

        return $status;
    }
}