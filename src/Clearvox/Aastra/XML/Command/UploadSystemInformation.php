<?php
namespace Clearvox\Aastra\XML\Command;

class UploadSystemInformation implements CommandInterface
{
    /**
     * Turn the implemented Command into the required string for
     * URI components.
     *
     * @return string
     */
    public function __toString()
    {
        return 'Command: UploadSystemInfo';
    }
}