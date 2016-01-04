<?php
namespace Clearvox\Aastra\XML\Command;

class Reset implements CommandInterface
{
    public function __toString()
    {
        return 'Command: Reset';
    }
}