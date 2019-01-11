<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 1:39 PM
 */

namespace RWC\Shutterfly;


use DOMDocument;
use DOMElement;

class Shipment extends AbstractXmlFragment
{
    /**
     * Fulfiller specified shipment identifier, unique within the scope of the
     * order. See below for the format.
     *
     * @var string
     */
    protected $shipmentNo;

    /**
     * Date the order shipped. Set and returned as a UNIX timestamp.
     *
     * @var int
     */
    protected $shipmentDate;

    /**
     * Carrier assigned tracking number for the shipment
     *
     * @var string
     */
    protected $trackingNo;

    /**
     * Shipping carrier actually used for the shipment. See section 12.4
     * “Shipping Carriers” for allowed values
     *
     * @var string
     */
    protected $carrier;

    /**
     * Shipping method actually used for the shipment. See section 12.5
     * “Shipping Methods” for allowed values
     *
     * @var string
     */
    protected $method;

    /**
     * String identifier for packaging used to ship the content
     *
     * @var null|string
     */
    protected $packagingNo;

    /**
     * Shipping cost in dollars
     *
     * @var float|null
     */
    protected $cost;

    /**
     * Shipment weight in pounds
     *
     * @var float|null
     */
    protected $weight;

    /**
     * Expected ship date if computed when the order was received. Stored
     * and returned as a UNIX timestamp.
     *
     * @var int|null
     */
    protected $expectedShipDate;

    /**
     * Expected carrier if computed when the order was received
     *
     * @var string|null
     */
    protected $expectedCarrier;

    /**
     * Expected shipping method if computed when the order was received
     *
     * @var  string|null
     */
    protected $expectedMethod;

    /**
     * Expected transit days if computed when the order was received
     *
     * @var int|null
     */
    protected $expectedTransitDays;

    /**
     * The date the shipment items were ready to ship. Set and returned as a
     * UNIT timestamp.
     *
     * @var int
     */
    protected $readyToShipDate;

    /**
     * List of items in this shipment. See section 8.6.1 “ItemType Elements”
     *
     * @var Status\Item[]  List of items in this shipment.
     */
    protected $items;

    /**
     * Shipment constructor.
     * @param string $shipmentNo
     * @param int $shipmentDate
     * @param string $trackingNo
     * @param string $carrier
     * @param string $method
     * @param null|string $packagingNo
     * @param float|null $cost
     * @param float|null $weight
     * @param int|null $expectedShipDate
     * @param null|string $expectedCarrier
     * @param null|string $expectedMethod
     * @param int|null $expectedTransitDays
     * @param int $readyToShipDate
     * @param Status\Item[] $items
     */
    public function __construct(
        string $shipmentNo,
        int $shipmentDate,
        string $trackingNo,
        string $carrier,
        string $method,
        ?string $packagingNo,
        ?float $cost,
        ?float $weight,
        ?int $expectedShipDate,
        ?string $expectedCarrier,
        ?string $expectedMethod,
        ?int $expectedTransitDays,
        int $readyToShipDate,
        array $items
    ) {
        $this->setShipmentNo($shipmentNo);
        $this->setShipmentDate($shipmentDate);
        $this->setTrackingNo($trackingNo);
        $this->setCarrier($carrier);
        $this->setMethod($method);
        $this->setPackagingNo($packagingNo);
        $this->setCost($cost);
        $this->setWeight($weight);
        $this->setExpectedCarrier($expectedCarrier);
        $this->setExpectedShipDate($expectedShipDate);
        $this->setExpectedMethod($expectedMethod);
        $this->setExpectedTransitDays($expectedTransitDays);
        $this->setReadyToShipDate($readyToShipDate);
        $this->setItems($items);
    }

    /**
     * Fulfiller specified shipment identifier, unique within the scope of the order.
     *
     * @return string Fulfiller specified shipment identifier, unique within the scope of the order.
     */
    public function getShipmentNo(): string
    {
        return $this->shipmentNo;
    }

    /**
     * Fulfiller specified shipment identifier, unique within the scope of the order.
     *
     * @param string $shipmentNo Fulfiller specified shipment identifier, unique within the scope of the order.
     */
    public function setShipmentNo(string $shipmentNo): void
    {
        $this->shipmentNo = $shipmentNo;
    }

    /**
     * Date the order shipped.
     *
     * @return int Date the order shipped.
     */
    public function getShipmentDate(): int
    {
        return $this->shipmentDate;
    }

    /**
     * Date the order shipped.
     *
     * @param int $shipmentDate Date the order shipped.
     */
    public function setShipmentDate(int $shipmentDate): void
    {
        $this->shipmentDate = $shipmentDate;
    }

    /**
     * Carrier assigned tracking number for the shipment
     *
     * @return string Carrier assigned tracking number for the shipment
     */
    public function getTrackingNo(): string
    {
        return $this->trackingNo;
    }

    /**
     * Carrier assigned tracking number for the shipment
     *
     * @param string $trackingNo Carrier assigned tracking number for the shipment
     */
    public function setTrackingNo(string $trackingNo): void
    {
        $this->trackingNo = $trackingNo;
    }

    /**
     * Shipping carrier actually used for the shipment.
     *
     * @return string Shipping carrier actually used for the shipment.
     */
    public function getCarrier(): string
    {
        return $this->carrier;
    }

    /**
     * Shipping carrier actually used for the shipment.
     *
     * @param string $carrier Shipping carrier actually used for the shipment.
     */
    public function setCarrier(string $carrier): void
    {
        $this->carrier = $carrier;
    }

    /**
     * Shipping method actually used for the shipment.
     *
     * @return string Shipping method actually used for the shipment.
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Shipping method actually used for the shipment.
     *
     * @param string $method Shipping method actually used for the shipment.
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * String identifier for packaging used to ship the content
     *
     * @return null|string String identifier for packaging used to ship the content
     */
    public function getPackagingNo(): ?string
    {
        return $this->packagingNo;
    }

    /**
     * String identifier for packaging used to ship the content
     *
     * @param null|string $packagingNo String identifier for packaging used to ship the content
     */
    public function setPackagingNo(?string $packagingNo): void
    {
        $this->packagingNo = $packagingNo;
    }

    /**
     * Shipping cost in dollar
     *
     * @return float|null Shipping cost in dollars
     */
    public function getCost(): ?float
    {
        return $this->cost;
    }

    /**
     * Shipping cost in dollars
     *
     * @param float|null $cost Shipping cost in dollars
     */
    public function setCost(?float $cost): void
    {
        $this->cost = $cost;
    }

    /**
     * Shipment weight in pounds
     *
     * @return float|null Shipment weight in pounds
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * Shipment weight in pounds
     *
     * @param float|null $weight Shipment weight in pounds
     */
    public function setWeight(?float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * Expected ship date if computed when the order was received
     *
     * @return int|null Expected ship date if computed when the order was received
     */
    public function getExpectedShipDate(): ?int
    {
        return $this->expectedShipDate;
    }

    /**
     * Expected ship date if computed when the order was received
     *
     * @param int|null $expectedShipDate Expected ship date if computed when the order was received
     */
    public function setExpectedShipDate(?int $expectedShipDate): void
    {
        $this->expectedShipDate = $expectedShipDate;
    }

    /**
     * Expected ship date if computed when the order was received
     *
     * @return null|string Expected ship date if computed when the order was received
     */
    public function getExpectedCarrier(): ?string
    {
        return $this->expectedCarrier;
    }

    /**
     * Expected carrier if computed when the order was received
     *
     * @param null|string $expectedCarrier Expected carrier if computed when the order was received
     */
    public function setExpectedCarrier(?string $expectedCarrier): void
    {
        $this->expectedCarrier = $expectedCarrier;
    }

    /**
     * Expected shipping method if computed when the order was received
     *
     * @return null|string Expected shipping method if computed when the order was received
     */
    public function getExpectedMethod(): ?string
    {
        return $this->expectedMethod;
    }

    /**
     * Expected shipping method if computed when the order was received
     *
     * @param null|string $expectedMethod Expected shipping method if computed when the order was received
     */
    public function setExpectedMethod(?string $expectedMethod): void
    {
        $this->expectedMethod = $expectedMethod;
    }

    /**
     * Expected transit days if computed when the order was received
     *
     * @return int|null Expected transit days if computed when the order was received
     */
    public function getExpectedTransitDays(): ?int
    {
        return $this->expectedTransitDays;
    }

    /**
     * Expected transit days if computed when the order was received
     *
     * @param int|null $expectedTransitDays Expected transit days if computed when the order was received
     */
    public function setExpectedTransitDays(?int $expectedTransitDays): void
    {
        $this->expectedTransitDays = $expectedTransitDays;
    }

    /**
     * The date the shipment items were ready to ship
     *
     * @return int|null The date the shipment items were ready to ship
     */
    public function getReadyToShipDate(): ?int
    {
        return $this->readyToShipDate;
    }

    /**
     * The date the shipment items were ready to ship
     *
     * @param int|null $readyToShipDate The date the shipment items were ready to ship
     */
    public function setReadyToShipDate(?int $readyToShipDate): void
    {
        $this->readyToShipDate = $readyToShipDate;
    }

    /**
     * List of items in this shipment.
     *
     * @return Status\Item[] List of items in this shipment.
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * List of items in this shipment. See section 8.6.1 “ItemType Elements
     *
     * @param Status\Item[] $items List of items in this shipment.
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        // shipmentNo is required
        if (! self::hasChild($element,'shipmentNo')) {
            throw new \InvalidArgumentException(
                'shipmentNo is a required sub-element'
            );
        }
        $shipmentNo = self::getFirstChild($element, 'shipmentNo')->textContent;

        // shipDate is required
        if (! self::hasChild($element, 'shipDate')) {
            throw new \InvalidArgumentException(
                'shipDate is a required sub-element'
            );
        }
        // TODO How to convert shipDate?
        $shipDate = self::getFirstChild($element, 'shipDate')->textContent;

        //trackingNo is optional, but in reality needs to be set.
        $trackingNo = null;
        if (self::hasChild($element, 'trackingNo')) {
            $trackingNo = self::getFirstChild($element, 'trackingNo')->textContent;
        }

        // carrier is required.
        if (! self::hasChild($element, 'carrier')) {
            throw new \InvalidArgumentException(
                'carrier is a required sub-element'
            );
        }
        // TODO carrier validation?
        $carrier = self::getFirstChild($element, 'carrier')->textContent;

        // method is required
        if (! self::hasChild($element, 'method')) {
            throw new \InvalidArgumentException(
                'method is a required sub-element'
            );
        }
        $method = self::getFirstChild($element, 'method')->textContent;

        // packagingNo is optional
        $packagingNo = null;
        if (self::hasChild($element, 'packagingNo')) {
            $packagingNo = self::getFirstChild($element, 'packagingNo')->textContent;
        }

        // cost is optional
        $cost = null;
        if (self::hasChild($element, 'cost')) {
            $cost = self::getFirstChild($element, 'cost')->textContent;
        }

        // weight is optional
        $weight = null;
        if (self::hasChild($element, 'weight')) {
            $weight = self::getFirstChild($element, 'weight')->textContent;
        }

        // expectedShipDate is optional
        $expectedShipDate = null;
        if (self::hasChild($element, 'expectedShipDate')) {
            // TODO Date conversion?
            $expectedShipDate = self::getFirstChild($element, 'expectedShipDate')->textContent;
        }

        // expectedCarrier is optional
        $expectedCarrier = null;
        if (self::hasChild($element, 'expectedCarrier')) {
            $expectedCarrier = self::getFirstChild($element, 'expectedCarrier')->textContent;
        }

        // expectedMethod is optional
        $expectedMethod = null;
        if (self::hasChild($element, 'expectedMethod')) {
            $expectedMethod = self::getFirstChild($element, 'expectedMethod')->textContent;
        }

        // expectedTransitDays is optional
        $expectedTransitDays = null;
        if (self::hasChild($element, 'expectedTransitDays')) {
            $expectedTransitDays = self::getFirstChild($element, 'expectedTransitDays')->textContent;
        }

        // readyToShipDate is optional
        $readyToShipDate = null;
        if (self::hasChild($element, 'readyToShipDate')) {
            // TODO date translation?
            $readyToShipDate = self::getFirstChild($element, 'readyToShipDate')->textContent;
        }

        // items is required
        if (! self::hasChild($element, 'items')) {
            throw new \InvalidArgumentException(
                'items is a required sub-element'
            );
        }
        $items = [];
        $itemsEl = self::getFirstChild($element, 'items');
        $itemEls = $itemsEl->getElementsByTagName('item');
        foreach ($itemEls as $itemEl) {
            $items[] = StatusItem::fromDomElement($itemEl);
        }

        return new Shipment(
            $shipmentNo,
            $shipmentDate,
            $trackingNo,
            $carrier,
            $method,
            $packagingNo,
            $cost,
            $weight,
            $expectedShipDate,
            $expectedCarrier,
            $expectedMethod,
            $expectedTransitDays,
            $readyToShipDate,
            $items
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
        // TODO: Implement toDomElement() method.
    }
}