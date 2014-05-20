<?php
namespace Clearvox\Aastra\XML\Common\Attribute;

use Clearvox\Aastra\XML\Common\Attribute\Color\ColorInterface;

trait Color
{
    protected $color;

    public function setColor(ColorInterface $color)
    {
        $this->color = $color->getName();
        return $this;
    }
}