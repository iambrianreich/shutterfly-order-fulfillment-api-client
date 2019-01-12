<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 1:33 PM
 */

namespace RWC\Shutterfly\Status;


use DOMDocument;
use DOMElement;
use RWC\Shutterfly\AbstractXmlFragment;

class StatusItem extends AbstractXmlFragment
{
    /**
     * Shutterfly specified item identifier. Same as itemNo in Order XML.
     *
     * @var string
     */
    protected $itemNo;

    /**
     * Fulfiller specific sku.
     *
     * @var string
     */
    protected $sku;

    /**
     * Quantity of item that's being reported in the status.
     *
     * @var int
     */
    protected $quantity;

    /**
     * Extra status notes.
     *
     * @var string|null
     */
    protected $notes;

    /**
     * StatusItem constructor.
     * @param string $itemNo
     * @param string $sku
     * @param int $quantity
     * @param null|string $notes
     */
    public function __construct(string $itemNo, string $sku, int $quantity, ?string $notes = null)
    {
        $this->setItemNo($itemNo);
        $this->setSku($sku);
        $this->setQuantity($quantity);
        $this->setNotes($notes);
    }

    /**
     * Returns the Shutterfly specified item number.
     *
     * @return string Returns the Shutterfly specified item number.
     */
    public function getItemNo(): string
    {
        return $this->itemNo;
    }

    /**
     * Sets the Shutterfly specified item number.
     *
     * @param string $itemNo Sets the Shutterfly specified item number.
     */
    public function setItemNo(string $itemNo): void
    {
        $this->itemNo = $itemNo;
    }

    /**
     * Returns the vendor-specific SKU.
     *
     * @return string Returns the vendor specific SKU.
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * Sets the vendor specific SKU.
     *
     * @param string $sku Vendor specific SKU.
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * Returns the item quantity being reported in the status update.
     *
     * @return int Returns the item quantity being reported in the status update.
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Sets the item quantity being reported in the status update.
     *
     * @param int $quantity Item quantity being reported in the status update.
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns extra status notes
     *
     * @return null|string Returns extra status notes
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * Sets extra status notes.
     *
     * @param null|string $notes Extra status notes
     */
    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }


    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        // itemNo is required
        if (self::hasChild($element, 'itemNo')) {
            throw new \InvalidArgumentException(
                'itemNo is a required sub-element'
            );
        }

        $itemNo = self::getFirstChild($element, 'itemNo');

        // sku is required
        if (self::hasChild($element, 'sku')) {
            throw new \InvalidArgumentException(
                'sku is a required sub-element'
            );
        }

        $sku = self::getFirstChild($element, 'sku')->textContent;

        // quantity is required
        if (self::hasChild($element, 'quantity')) {
            throw new \InvalidArgumentException(
                'quantity is a required field'
            );
        }

        $quantity = self::getFirstChild($element, 'quantity')->textContent;

        // notes is optional
        $notes = null;
        if (self::hasChild($element, 'notes')) {
            $notes = self::getFirstChild($element, 'notes')->textContent;
        }

        return new StatusItem(
            $itemNo,
            $sku,
            $quantity,
            $notes
        );
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        $itemEl = $document->createElement('item');
        $itemEl->appendChild($document->createElement('itemNo', $this->getItemNo()));
        $itemEl->appendChild($document->createElement('sku', $this->getSku()));
        $itemEl->appendChild($document->createElement('quantity', $this->getQuantity()));

        if (! empty($this->getNotes())) {
            $itemEl->appendChild($document->createElement('notes', $this->getNotes()));
        }

        return $itemEl;
    }
}