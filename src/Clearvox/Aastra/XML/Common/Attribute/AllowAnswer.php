<?php
namespace Clearvox\Aastra\XML\Common\Attribute;

trait AllowAnswer
{
    /**
     * @var bool
     */
    protected $allowAnswer;

    /**
     * THIS METHOD ONLY APPLIES TO NON SOFTKEY PHONES!
     *
     * The phone will display Ignore and Answer if the XML object is
     * displayed when the phone is in ringing state.
     *
     * Models: 6730i, 6731i, 53i, 6739i, 9143i, 6863i, 6865i
     *
     * @see Section 6.3 of the Official XML Document
     * @return $this
     */
    public function allowAnswer()
    {
        $this->allowAnswer = true;
        return $this;
    }
}