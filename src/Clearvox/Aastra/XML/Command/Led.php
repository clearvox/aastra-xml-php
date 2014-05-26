<?php
namespace Clearvox\Aastra\XML\Command;

class Led implements CommandInterface
{
    const ON = 'on';
    const OFF = 'off';
    const SLOW = 'slowflash';
    const FAST = 'fastflash';

    /**
     * @var int
     */
    private $key;

    /**
     * @var string
     */
    private $action;

    /**
     * Specify the Led light, of a specific key, to do a
     * specific action. The actions are stored as constants
     * of this class
     *
     * You should use one of the following:
     *
     * Led::ON
     * Led::OFF
     * Led::SLOW
     * Led::FAST
     *
     * @param int $key
     * @param string $action
     */
    public function __construct($key, $action)
    {
        $this->key    = $key;
        $this->action = $action;
    }

    /**
     * Turn the implemented Command into the required string for
     * URI components.
     *
     * @return string
     */
    public function __toString()
    {
        return "Led: {$this->key}={$this->action}";
    }
}