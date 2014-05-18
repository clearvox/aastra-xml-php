<?php
namespace Clearvox\Aastra\XML\Common\Attribute\Color;

trait Colorable
{
    protected $color;

    public function setColor(ColorInterface $color)
    {
        $this->color = $color->getName();
        return $this;
    }
}