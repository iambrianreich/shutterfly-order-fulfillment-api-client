<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/11/2019
 * Time: 9:47 AM
 */

namespace RWC\Shutterfly;


use DOMDocument;
use DOMElement;
use RWC\Shutterfly\Rejection\Copyright;
use RWC\Shutterfly\Rejection\Fraud;
use RWC\Shutterfly\Rejection\ImageCorrupt;
use RWC\Shutterfly\Rejection\ImageUnavailable;
use RWC\Shutterfly\Rejection\IReason;
use RWC\Shutterfly\Rejection\LowResolution;
use RWC\Shutterfly\Rejection\Obscene;
use RWC\Shutterfly\Rejection\Other;
use RWC\Shutterfly\Rejection\WontShip;

class Rejected extends AbstractXmlFragment
{
    /**
     * The reason the item was rejected.
     *
     * @var IReason
     */
    protected $reason;

    /**
     * Date items were rejected.
     *
     * @var int
     */
    protected $date;

    /**
     * List of items that were rejected.
     *
     * @var Items
     */
    protected $items;

    /**
     * Rejected constructor.
     * @param IReason $reason
     * @param int $date
     * @param Items $items
     */
    public function __construct(IReason $reason, int $date, Items $items)
    {
       $this->setReason($reason);
       $this->setDate($date);
       $this->setItems($items);
    }

    /**
     * Reason items were rejected.
     *
     * @return IReason Reason items were rejected.
     */
    public function getReason(): IReason
    {
        return $this->reason;
    }

    /**
     * Reason items were rejected.
     *
     * @param IReason $reason Reason items were rejected.
     */
    public function setReason(IReason $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * Date items were rejected.
     *
     * @return int Date items were rejected.
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * Date items were rejected.
     *
     * @param int $date Date items were rejected.
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * List of items that were rejected.
     *
     * @return Items List of items that were rejected.
     */
    public function getItems(): Items
    {
        return $this->items;
    }

    /**
     * List of items that were rejected.
     *
     * @param Items $items List of items that were rejected.
     */
    public function setItems(Items $items): void
    {
        $this->items = $items;
    }

    /**
     * Returns true if there are items in the StatusItems.
     *
     * @return bool Returns true if there are items.
     */
    public function hasItems() : bool
    {
        return $this->getItems()->hasItems();
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        // ReasonCode is required.
        if (! self::hasChild($element, 'reasonCode')) {
            throw new \InvalidArgumentException(
                'reasonCode is a required sub-element'
            );
        }
        $reason = self::getReasonImpl(self::getFirstChild($element, 'reasonCode')->textContent);

        // reason is required. Could be custom reason so assign to Reason.
        if (! self::hasChild($element, 'reason')) {
            throw new \InvalidArgumentException(
                'reason is required'
            );
        }
        $reasonDesc = self::getFirstChild($element, 'reason')->textContent;
        $reason->setReason($reasonDesc);

        // date is required
        if (! self::hasChild($element, 'date')) {
            throw new \InvalidArgumentException(
                'date is a required sub-element'
            );
        }
        // TODO Date conversion
        $date = self::getFirstChild($element, 'date')->textContent;

        // items is required
        if (! self::hasChild($element, 'items')) {
            throw new \InvalidArgumentException(
                'items is a required sub-element'
            );
        }

        /** @var Items $items */
        $items = Items::fromDomElement(self::getFirstChild($element, 'items'));

        return new Rejected($reason, $date, $items);
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        $rejected = $document->createElement('rejected');
        $rejected->appendChild($document->createElement('reasonCode', $this->getReason()->getCode()));
        $rejected->appendChild($document->createElement('reason', $this->getReason()->getReason()));
        // TODO Date conversion
        $rejected->appendChild($document->createElement('date', $this->getDate()));
        $rejected->appendChild($this->getItems()->toDomElement($document));
        return $rejected;
    }

    /**
     * Returns the concrete IReason associated with the reason code.
     *
     * @param string $reasonCode The reason code.
     * @return IReason Returns the concrete IReason implementation.
     */
    private static function getReasonImpl(string $reasonCode) : IReason
    {
        switch ($reasonCode)
        {
            case 'COPYRIGHT': return new Copyright();
            case 'IMAGE_UNAVAIL': return new ImageUnavailable();
            case 'IMAGE_CORRUPT': return new ImageCorrupt();
            case 'LOW_RESOLUTION': return new LowResolution();
            case 'FRAUD': return new Fraud();
            case 'OBSCENE': return new Obscene();
            case 'WONT_SHIP': return new WontShip();
            case 'OTHER': return new Other();
            default:
                throw new \InvalidArgumentException(
                    "$reasonCode is not a valid rejection reason code"
                );
        }
    }
}