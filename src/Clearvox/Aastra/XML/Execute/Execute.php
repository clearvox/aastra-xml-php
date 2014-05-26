<?php
namespace Clearvox\Aastra\XML\Execute;

use Clearvox\Aastra\XML\XMLObjectInterface;
use Clearvox\Aastra\XML\Common\Attribute as Attributes;

/**
 * AastraIPPhoneExecute Object.  Use this object to generate one or more
 * ExecuteItem entries.
 *
 * @see |Clearvox\Aastra\XML\Execute\ExecuteItem
 *
 * @uses |Clearvox\Aastra\XML\Common\Attribute\Beep
 * @uses \Clearvox\Aastra\XML\Common\Attribute\TriggerDestroyOnExit
 *
 * @category Clearvox
 * @package Aastra
 * @subpackage XML\Execute
 * @author Leon Rowland <leon@rowland.nl>
 */
class Execute implements XMLObjectInterface
{
    use Attributes\Beep;
    use Attributes\TriggerDestroyOnExit;

    /**
     * @var ExecuteItem[]
     */
    private $items = array();

    /**
     * Add an ExecuteItem to this AastraIPPhoneExecute instance.
     *
     * @param ExecuteItem $item
     * @return $this
     */
    public function addItem(ExecuteItem $item)
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * Returns all ExecuteItems assigned to this AastraIPPhoneExecute
     * instance.
     *
     * @return ExecuteItem[]
     */
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