<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/11/2019
 * Time: 8:17 AM
 */

namespace RWC\Shutterfly\Status;


use DOMDocument;
use DOMElement;
use RWC\Shutterfly\AbstractXmlFragment;
use RWC\Shutterfly\IXmlFragment;
use RWC\Shutterfly\StatusItem;

class StatusItems extends AbstractXmlFragment
{
    /**
     * A collection of StatusItem instances.
     *
     * @var StatusItem[]
     */
    protected $items;

    /**
     * StatusItems constructor.
     * @param StatusItem[] $items
     */
    public function __construct(array $items)
    {
        $this->setItems($items);
    }

    /**
     * Returns a collection of StatusItem instances.
     *
     * @return StatusItem[] Returns a collection of StatusItem instances.
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Sets a collection of StatusItem instances.
     *
     * @param StatusItem[] $items A collection of StatusItem instances.
     */
    public function setItems(array $items): void
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
        return count($this->getItems()) > 0;
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        $items = [];
        $statusItemEls = $element->getElementsByTagName('item');
        foreach ($statusItemEls as $statusItemEl) {
            $items[] = StatusItem::fromDomElement($statusItemEl);
        }

        return new StatusItems($items);
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        $element = $document->createElement('statusItems');
        foreach ($this->getItems() as $item) {
            $element->appendChild($item->toDomElement($document));
        }

        return $element;
    }
}