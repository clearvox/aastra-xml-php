<?php
namespace Clearvox\Aastra\XML\Command;

class ClearLocal implements CommandInterface
{
    public function __toString()
    {
        return 'Command: ClearLocal';
    }
}