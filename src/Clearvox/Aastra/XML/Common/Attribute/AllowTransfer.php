<?php
namespace Clearvox\Aastra\XML\Common\Attribute;

trait AllowTransfer
{
    /**
     * @var bool
     */
    protected $allowXfer;

    /**
     * THIS METHOD ONLY APPLIES TO NON SOFTKEY PHONES!
     *
     * The phone will display Xfer if the XML object is displayed
     * when the phone is in the connected state.
     *
     * Models: 6730i, 6731i, 53i, 6739i, 9143i, 6863i, 6865i
     *
     * @see Section 6.4 of the Official XML Document
     * @return $this
     */
    public function allowTransfer()
    {
        $this->allowXfer = true;
        return $this;
    }
}