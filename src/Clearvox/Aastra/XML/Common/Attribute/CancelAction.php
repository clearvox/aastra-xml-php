<?php
namespace Clearvox\Aastra\XML\Common\Attribute;

trait CancelAction
{
    /**
     * @var string
     */
    protected $cancelAction;

    /**
     * Specifies the URI to call when the user cancels
     * the XML object.
     *
     * @param string $cancelActionURI
     * @return $this;
     */
    public function setCancelAction($cancelActionURI)
    {
        $this->cancelAction = $cancelActionURI;
        return $this;
    }
}