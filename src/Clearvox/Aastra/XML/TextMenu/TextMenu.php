<?php
namespace Clearvox\Aastra\XML\TextMenu;

use Clearvox\Aastra\XML\Common\Attribute as Attributes;
use Clearvox\Aastra\XML\XMLObjectInterface;

class TextMenu implements XMLObjectInterface
{
    use Attributes\AllowAnswer;
    use Attributes\AllowConference;
    use Attributes\AllowDrop;
    use Attributes\AllowTransfer;
    use Attributes\Beep;
    use Attributes\DestroyOnExit;
    use Attributes\GoodbyeLockInURI;
    use Attributes\LockIn;
    use Attributes\Timeout;

    /**
     * @var integer
     */
    protected $defaultIndex;

    /**
     * @var string
     */
    protected $style;

    /**
     * @var bool
     */
    protected $wrapList;

    /**
     * @var bool
     */
    protected $scrollConstrain;

    /**
     * @var bool
     */
    protected $unitScroll;

    /**
     * @var string
     */
    protected $scrollUp;

    /**
     * @var string
     */
    protected $scrollDown;

    /**
     * @var string
     */
    protected $numberLaunch;

    /**
     * @var array
     */
    private $items = array();

    /**
     * Add Items to go inside the AastraIPPhoneTextMenu.
     *
     * It currently supports
     * - Title
     * - TopTitle
     * - MenuItem
     * - IconList
     * - SoftKey
     *
     * with a limit of 30
     *
     * @param XMLObjectInterface $item
     * @return $this
     */
    public function addItem(XMLObjectInterface $item)
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * Return all items that will go inside the AastraIPPhoneTextMenu
     *
     * @return array[XMLObjectInterface]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Position of the cursor when the XML object is open.
     * If not specified the arrow is positioned on the first menu
     * item.
     *
     * @param integer $defaultIndex
     * @return $this
     */
    public function setDefaultIndex($defaultIndex)
    {
        $this->defaultIndex = $defaultIndex;
        return $this;
    }

    /**
     * Allowed options are 'numbered', 'none', 'radio'
     * Default is 'numbered'
     *
     * IGNORED ON 6731i, STYLE IS ALWAYS 'NUMBERED'
     * IGNORED ON 6867i AND 6739i, STYLE IS ALWAYS 'NONE'
     *
     * @param string $style
     * @return $this
     */
    public function setStyle($style)
    {
        $validStyles = array(
            'numbered',
            'none',
            'radio'
        );

        if ( ! in_array($style, $validStyles)) {
            throw new Exception\InvalidStyleException;
        }

        $this->style = $style;
        return $this;
    }





    /**
     * Indicates that the items will be text wrapped on 2 lines
     *
     * IGNORED ON 6867i AND 6739i, LINES ARE AUTOMATICALLY WRAPPED.
     *
     * @return $this
     */
    public function wrapList()
    {
        $this->wrapList = true;
        return $this;
    }





    /**
     * The phone will not wrap the list. This means that scrolling down to
     * the last item does not move the cursor back to the first item.
     *
     * @return $this
     */
    public function scrollConstrain()
    {
        $this->scrollConstrain = true;
        return $this;
    }

    /**
     * The phone will allow the user to launch an item URI
     * using the keypad (1-9 only)
     *
     * Ignored on 6739i
     *
     * @return $this
     */
    public function numberLaunch()
    {
        $this->numberLaunch = true;
        return $this;
    }

    /**
     * The 6739i will scroll menu items in the list as it is done
     * on the other phones, pressing the Up/Down arrow moves the
     * selected item by one.
     *
     * 6739i only
     *
     * @return $this
     */
    public function unitScroll()
    {
        $this->unitScroll = true;
        return $this;
    }

    /**
     * Overrides the default behaviour of the Up arrow key once
     * the scrolling reaches an end.
     *
     * @param string $uri
     * @return $this
     */
    public function setScrollUp($uri)
    {
        $this->scrollUp = $uri;
        return $this;
    }

    /**
     * Overrides the default behaviour of the Down arrow key once
     * the scrolling reaches an end.
     *
     * @param $uri
     * @return $this
     */
    public function setScrollDown($uri)
    {
        $this->scrollDown = $uri;
        return $this;
    }

    /**
     * Returns the DOMElement that the implemented
     * class represents.
     *
     * @return \DOMElement
     */
    public function generate()
    {
        $tempDOM = new \DOMDocument();
        $textMenu = $tempDOM->createElement('AastraIPPhoneTextMenu');

        if (isset($this->defaultIndex)) {
            $textMenu->setAttribute('defaultIndex', $this->defaultIndex);
        }

        if (isset($this->style)) {
            $textMenu->setAttribute('style', $this->style);
        }

        if (true === $this->destroyOnExit) {
            $textMenu->setAttribute('destroyOnExit', 'yes');
        }

        if (isset($this->cancelAction)) {
            $textMenu->setAttribute('cancelAction', $this->cancelAction);
        }

        if (true === $this->wrapList) {
            $textMenu->setAttribute('wrapList', 'yes');
        }

        if (true === $this->beep) {
            $textMenu->setAttribute('Beep', 'yes');
        }

        if (isset($this->timeout)) {
            $textMenu->setAttribute('Timeout', $this->timeout);
        }

        if (true === $this->lockIn) {
            $textMenu->setAttribute('LockIn', 'yes');
        }

        if (isset($this->goodbyeLockInURI)) {
            $textMenu->setAttribute('GoodbyeLockInURI', $this->goodbyeLockInURI);
        }

        if (true === $this->allowAnswer) {
            $textMenu->setAttribute('allowAnswer', 'yes');
        }

        if (true === $this->allowDrop) {
            $textMenu->setAttribute('allowDrop', 'yes');
        }

        if (true === $this->allowXfer) {
            $textMenu->setAttribute('allowXfer', 'yes');
        }

        if (true === $this->allowConf) {
            $textMenu->setAttribute('allowConf', 'yes');
        }

        if (true === $this->scrollConstrain) {
            $textMenu->setAttribute('scrollConstrain', 'yes');
        }

        if (true === $this->numberLaunch) {
            $textMenu->setAttribute('numberLaunch', 'yes');
        }

        if (true === $this->unitScroll) {
            $textMenu->setAttribute('unitScroll', 'yes');
        }

        if (isset($this->scrollUp)) {
            $textMenu->setAttribute('scrollUp', $this->scrollUp);
        }

        if (isset($this->scrollDown)) {
            $textMenu->setAttribute('scrollDown', $this->scrollDown);
        }

        foreach ($this->getItems() as $item) {
            $textMenu->appendChild($tempDOM->importNode($item->generate(), true));
        }

        unset($tempDOM);
        return $textMenu;
    }

}