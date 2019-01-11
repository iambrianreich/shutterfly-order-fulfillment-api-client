<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/11/2019
 * Time: 8:15 AM
 */

namespace RWC\Shutterfly\Status;


use DOMDocument;
use DOMElement;
use RWC\Shutterfly\AbstractXmlFragment;
use RWC\Shutterfly\IXmlFragment;
use RWC\Shutterfly\Status\Shipment;

class Shipments extends AbstractXmlFragment
{
    /**
     * A collection of Shipment objects.
     *
     * @var Shipment[]
     */
    protected $shipments;

    /**
     * Shipments constructor.
     * @param Shipment[] $items
     */
    public function __construct(array $items)
    {
        $this->setShipments($items);
    }

    /**
     * Returns a collection of Shipment instances.
     *
     * @return Shipment[] Returns a collection of Shipment instances.
     */
    public function getShipments(): array
    {
        return $this->shipments;
    }

    /**
     * Sets a collection of Shipment instances.
     *
     * @param Shipment[] $shipments A collection of Shipment instances.
     */
    public function setShipments(array $shipments): void
    {
        $this->shipments = $shipments;
    }

    /**
     * Returns true if there are items in the StatusItems.
     *
     * @return bool Returns true if there are items.
     */
    public function hasShipments() : bool
    {
        return count($this->getShipments()) > 0;
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        $shipments = [];
        $shipmentEls = $element->getElementsByTagName('shipment');
        foreach ($shipmentEls as $shipmentEl) {
            $shipments[] = Shipment::fromDomElement($shipmentEl);
        }

        return new Shipments($shipments);
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        $shipmentsEl = $document->createElement('shipments');
        foreach ($this->getShipments() as $shipment) {
            $shipmentsEl->appendChild($shipment->toDomElement($document));
        }

        return $shipmentsEl;
    }
}