<?php
namespace Clearvox\Aastra\XML\Common\Attribute;

trait AllowDrop
{
    /**
     * @var bool
     */
    protected $allowDrop;

    /**
     * THIS METHOD ONLY APPLIES TO NON SOFTKEY PHONES!
     *
     * The phone will display Drop if the XML object is displayed
     * when the phone is in the connected state.
     *
     * Models: 6730i, 6731i, 53i, 6739i, 9143i, 6863i, 6865i
     *
     * @see Section 6.4 of the Official XML Document
     * @return $this
     */
    public function allowDrop()
    {
        $this->allowDrop = true;
        return $this;
    }
}