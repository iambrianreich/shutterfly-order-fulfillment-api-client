<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/11/2019
 * Time: 9:36 AM
 */

namespace RWC\Shutterfly\Status;


use DOMDocument;
use DOMElement;
use RWC\Shutterfly\AbstractXmlFragment;
use RWC\Shutterfly\IXmlFragment;
use RWC\Shutterfly\StatusItem;

class Items extends AbstractXmlFragment
{
    /**
     * A collection of StatusItems.
     *
     * @var StatusItem[]
     */
    protected $items;

    /**
     * Items constructor.
     * @param StatusItem[] $items
     */
    public function __construct(array $items)
    {
        $this->setItems($items);
    }

    /**
     * A collection of StatusItems.
     *
     * @return StatusItem[] A collection of StatusItems.
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * A collection of StatusItems.
     *
     * @param StatusItem[] $items A collection of StatusItems.
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * Returns true if there are items in the collection.
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
        $itemEls = $element->getElementsByTagName('item');
        foreach ($itemEls as $itemEl) {
            $items[] = StatusItem::fromDomElement($itemEl);
        }

        return new Items($items);
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        $itemsEl = $document->createElement('items');
        foreach ($this->getItems() as $item) {
            $itemsEl->appendChild($item->toDomElement($document));
        }

        return $itemsEl;
    }
}