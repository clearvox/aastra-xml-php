<?php
namespace Clearvox\Aastra\XML\Execute;

use Clearvox\Aastra\XML\XMLObjectInterface;
use Clearvox\Aastra\XML\Common\Attribute as Attributes;

class Execute implements XMLObjectInterface
{
    use Attributes\Beep;
    use Attributes\TriggerDestroyOnExit;

    private $items = array();

    public function addItem(XMLObjectInterface $item)
    {
        $this->items[] = $item;
        return $this;
    }

    public function getItems()
    {
        return $this->items;
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
        $execute = $tempDOM->createElement('AastraIPPhoneExecute');

        if (true === $this->beep) {
            $execute->setAttribute('Beep', 'yes');
        }

        if (true === $this->triggerDestroyOnExit) {
            $execute->setAttribute('triggerDestroyOnExit', 'yes');
        }

        foreach ($this->getItems() as $item) {
            $execute->appendChild($tempDOM->importNode($item->generate(), true));
        }

        unset($tempDOM);
        return $execute;
    }

}