<?php
namespace Clearvox\Aastra\XML\Configuration;

use Clearvox\Aastra\XML\Common\Attribute as Attributes;
use Clearvox\Aastra\XML\XMLObjectInterface;

class PhoneConfiguration implements XMLObjectInterface
{
    use Attributes\Beep;
    use Attributes\TriggerDestroyOnExit;

    /**
     * @var string
     */
    protected $type;

    const CONFIGURATION_TYPE_REMOTE   = 'remote';
    const CONFIGURATION_TYPE_LOCAL    = 'local';
    const CONFIGURATION_TYPE_ONEBOOT  = 'oneBoot';
    const CONFIGURATION_TYPE_OVERRIDE = 'override';

    protected $validTypes = [
        self::CONFIGURATION_TYPE_REMOTE,
        self::CONFIGURATION_TYPE_LOCAL,
        self::CONFIGURATION_TYPE_ONEBOOT,
        self::CONFIGURATION_TYPE_OVERRIDE,
    ];

    /**
     * @var XMLObjectInterface[]
     */
    protected $items = array();

    /**
     * Must be a valid CONFIGURATION_TYPE, from the constants
     * CONFIGURATION_TYPE_[REMOTE/LOCAL/ONEBOOT/OVERRIDE]
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        if( ! in_array($type, $this->validTypes)) {
            throw new \InvalidArgumentException("Invalid Type Given. Must be a valid type");
        }

        $this->type = $type;
        return $this;
    }

    /**
     * Add Items to go inside the AastraIPPhoneConfiguration
     *
     * @param XMLObjectInterface $item
     * @return $this
     */
    public function addItem(XMLObjectInterface $item)
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * Returns all items that will go inside the AastraIPPhoneConfiguration object.
     *
     * @return XMLObjectInterface[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return \DOMElement
     */
    public function generate()
    {
        $tempDOM = new \DOMDocument();
        $phoneConfig = $tempDOM->createElement('AastraIPPhoneConfiguration');

        if(true === $this->beep) {
            $phoneConfig->setAttribute('Beep', 'yes');
        }

        if(true === $this->triggerDestroyOnExit) {
            $phoneConfig->setAttribute('triggerDestroyOnExit', 'yes');
        }

        if(isset($this->type)) {
            $phoneConfig->setAttribute('setType', (string)$this->type);
        }

        foreach ($this->getItems() as $item) {
            $phoneConfig->appendChild($tempDOM->importNode($item->generate(), true));
        }

        unset($tempDOM);
        return $phoneConfig;
    }
}