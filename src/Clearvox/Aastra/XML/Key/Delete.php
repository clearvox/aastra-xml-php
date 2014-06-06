<?php
namespace Clearvox\Aastra\XML\Key;

class Delete implements KeyInterface
{
    public function __toString()
    {
        return 'Key:Delete';
    }
}