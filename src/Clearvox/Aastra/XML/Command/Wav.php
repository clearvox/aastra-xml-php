<?php
namespace Clearvox\Aastra\XML\Command;

class Wav implements CommandInterface
{
    protected $url;

    protected $volume;

    public function __construct($url, $volume = null)
    {
        $this->url    = $url;
        $this->volume = $volume;
    }

    /**
     * Turn the implemented Command into the required string for
     * URI components.
     *
     * @return string
     */
    public function __toString()
    {
        if ( ! is_null($this->volume)) {
            return 'Wav.Play:' . $this->volume . ':' . $this->url;
        } else {
            return 'Wav.Play:' . $this->url;
        }
    }
}