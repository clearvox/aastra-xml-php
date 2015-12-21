<?php
namespace Clearvox\Aastra\XML\Configuration;

use Clearvox\Aastra\XML\XMLObjectInterface;

class ConfigurationItem implements XMLObjectInterface
{
    /**
     * @var string
     */
    protected $type;

    const CONFIGURATION_TYPE_REMOTE   = 'remote';
    const CONFIGURATION_TYPE_LOCAL    = 'local';
    const CONFIGURATION_TYPE_ONEBOOT  = 'oneBoot';
    const CONFIGURATION_TYPE_OVERRIDE = 'override';

    protected $validTypes = [
        self::CONFIGURATION_TYPE_REMOTE,
        self::CONFIGURATION_TYPE_LOCAL,
        self::CONFIGURATION_TYPE_ONEBOOT,
        self::CONFIGURATION_TYPE_OVERRIDE,
    ];

    /**
     * @var string
     */
    protected $parameter;

    /**
     * @var string
     */
    protected $value;

    /**
     * Set the configuration parameter and value to be changed.
     *
     * @param string $parameter
     * @param string $value
     */
    public function __construct($parameter, $value)
    {
        $this->parameter = $parameter;
        $this->value     = $value;
    }

    /**
     * Must be a valid CONFIGURATION_TYPE, from the constants
     * CONFIGURATION_TYPE_[REMOTE/LOCAL/ONEBOOT/OVERRIDE] This value only applies
     * to this config option and takes precedence over the parent objects value.
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        if( ! in_array($type, $this->validTypes)) {
            throw new \InvalidArgumentException("Invalid Type Given. Must be a valid type");
        }

        $this->type = $type;
        return $this;
    }

    /**
     * Get the configuration parameter to be changed.
     *
     * @return string
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Get the value of the configuration parameter.
     *
     * @return $this
     */
    public function getValue()
    {
        return $this;
    }

    public function generate()
    {
        $tempDOM = new \DOMDocument();
        $configurationItem = $tempDOM->createElement('ConfigurationItem');

        if(isset($this->type)) {
            $configurationItem->setAttribute('setType', (string)$this->type);
        }

        $configurationItem->appendChild($tempDOM->createElement('Parameter', $this->parameter));
        $configurationItem->appendChild($tempDOM->createElement('Value', $this->value));

        unset($tempDOM);
        return $configurationItem;
    }
}