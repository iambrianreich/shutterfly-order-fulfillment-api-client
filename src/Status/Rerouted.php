<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/11/2019
 * Time: 9:07 AM
 */

namespace RWC\Shutterfly\Status;


use DOMDocument;
use DOMElement;
use RWC\Shutterfly\AbstractXmlFragment;
use RWC\Shutterfly\Status\Items;
use RWC\Shutterfly\IXmlFragment;
use RWC\Shutterfly\Utility\DateConverter;

class Rerouted extends AbstractXmlFragment
{
    /**
     * Text describing why items were rerouted.
     *
     * @var string|null
     *
     */
    protected $reason;

    /**
     * Date Items were rerouted.
     *
     * @var int
     */
    protected $date;

    /**
     * Date that fulfiller would accept this item again. Stored as UNIX timestamp.
     *
     * @var int|null
     */
    protected $expires;

    /**
     * List of items that were routed.
     *
     * @var Items
     */
    protected $items;

    /**
     * Rerouted constructor.
     * @param null|string $reason
     * @param int $date
     * @param int|null $expires
     * @param Items $items
     */
    public function __construct(?string $reason, int $date, ?int $expires, Items $items)
    {
        $this->setReason($reason);
        $this->setDate($date);
        $this->setExpires($expires);
        $this->setItems($items);
    }


    /**
     * Reason items were rerouted.
     *
     * @return null|string Reason items were rerouted.
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * Reason items were rerouted.
     *
     * @param null|string $reason Reason items were rerouted.
     */
    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * Date items were rerouted.
     *
     * @return int Date items were rerouted.
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * Date items were rerouted.
     *
     * @param int $date Date items were rerouted.
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * Date fulfiller would accept items again.
     *
     * @return int|null Date fulfiller would accept items again.
     */
    public function getExpires(): ?int
    {
        return $this->expires;
    }

    /**
     * Date fulfiller would accept items again.
     *
     * @param int|null $expires Date fulfiller would accept items again.
     */
    public function setExpires(?int $expires): void
    {
        $this->expires = $expires;
    }

    /**
     * List of rerouted items.
     *
     * @return Items List of rerouted items.
     */
    public function getItems(): Items
    {
        return $this->items;
    }

    /**
     * List of rerouted items.
     *
     * @param Items $items List of rerouted items.
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
        return $this->getItems()->hasItems() > 0;
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        // reason is optional
        $reason = null;
        if (self::hasChild($element, 'reason')) {
            $reason = self::getFirstChild($element, 'reason')->textContent;
        }

        // date is required
        if (! self::hasChild($element, 'date')) {
            throw new \InvalidArgumentException(
                'date is a required sub-element'
            );
        }
        $date = DateConverter::from(self::getFirstChild($element, 'date')->textContent);

        // expires is optional.
        $expires = null;
        if (self::hasChild($element, 'expires')) {
            $expires = DateConverter::from(self::getFirstChild($element, 'expires')->textContent);
        }

        // items is required
        if (! self::hasChild($element, 'items')) {
            throw new \InvalidArgumentException(
                'items is a required sub-element'
            );
        }
        /** @var Items $items */
        $items = Items::fromDomElement(self::getFirstChild($element, 'items'));

        return new Rerouted($reason, $date, $expires, $items);
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        $rerouted = $document->createElement('rerouted');

        // reason is optional.
        if (! empty($this->getReason())) {
            $rerouted->appendChild($document->createElement(
                'reason',
                $this->getReason()
            ));
        }

        // date is required
        $rerouted->appendChild($document->createElement(
            'date',
            DateConverter::to($this->getDate())
        ));

        // expires is optional
        if (null != $this->getExpires()) {
            $rerouted->appendChild($document->createElement(
                'expires',
                DateConverter::to($this->getExpires())
            ));
        }

        // items is required
        $rerouted->appendChild($this->getItems()->toDomElement($document));

        return $rerouted;
    }
}