<?php
/**
 * This file contains the RWC\Shutterfly\SubOrder class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */

namespace RWC\Shutterfly;

/**
 * Each suborder corresponds to a different recipient for items in this order.
 * Direct mail suborders have a different recipient for each item.
 *
 * @package RWC\Shutterfly
 */
class SubOrder extends AbstractSubOrder implements ISubOrder
{
    /**
     * Gift note for the recipient. How to use this is fulfiller and product
     * dependent.
     *
     * @var GiftNote|null
     */
    protected $giftNote;

    /**
     * Information that was given to the customer about when to expect delivery.
     *
     * @var DeliveryEstimate|null
     */
    protected $deliveryEstimate;

    /**
     * Greeting to include as part of the shipment. How to use this is
     * fulfiller dependent.
     *
     * @var Greeting|null
     */
    protected $greeting;

    /**
     * List of codes indicating marketing inserts to include with shipments.
     * What a code means will be determined offline between Shutterfly and
     * fulfillers.
     *
     * @var string|null
     */
    protected $insertCodes;

    /**
     * Code indicating what type of packaging to use for shipments. What a
     * code means will be determined offline between Shutterfly and fulfillers.
     *
     * @var string|null
     */
    protected $packagingCode;

    /**
     * Shipping address for all items in this suborder.
     *
     * @var Address
     */
    protected $shipAddress;

    /**
     * Deprecated in favor of “priority”. Boolean flag indicating the
     * customer’s order requires “rush” processing/handling.
     *
     * @var bool|null
     */
    protected $rush;

    /**
     * Boolean flag indicating the customer’s order has additional fulfillers.
     *
     * @var bool|null
     */
    protected $additionalFulfillers;

    /**
     * Shutterfly assigned identifier for the suborder, unique within the scope of the order
     *
     * @return string Shutterfly assigned identifier for the suborder, unique within the scope of the order
     */
    public function getSubOrderNo(): string
    {
        return $this->subOrderNo;
    }

    /**
     * Shutterfly assigned identifier for the suborder, unique within the scope of the order
     *
     * @param string $subOrderNo Shutterfly assigned identifier for the suborder, unique within the scope of the order
     */
    public function setSubOrderNo(string $subOrderNo): void
    {
        $this->subOrderNo = $subOrderNo;
    }

    /**
     * Gift note for the recipient. How to use this is fulfiller and product dependent.
     *
     * @return null|GiftNote Gift note for the recipient. How to use this is fulfiller and product dependent.
     */
    public function getGiftNote(): ?GiftNote
    {
        return $this->giftNote;
    }

    /**
     * Gift note for the recipient. How to use this is fulfiller and product dependent.
     *
     * @param null|GiftNote $giftNote Gift note for the recipient. How to use this is fulfiller and product dependent.
     */
    public function setGiftNote(?GiftNote $giftNote): void
    {
        $this->giftNote = $giftNote;
    }

    /**
     * Information that was given to the customer about when to expect delivery.
     *
     * @return null|DeliveryEstimate Information that was given to the customer about when to expect delivery.
     */
    public function getDeliveryEstimate(): ?DeliveryEstimate
    {
        return $this->deliveryEstimate;
    }

    /**
     * Information that was given to the customer about when to expect delivery.
     *
     * @param null|DeliveryEstimate $deliveryEstimate Information that was given to the customer about when to expect delivery.
     */
    public function setDeliveryEstimate(?DeliveryEstimate $deliveryEstimate): void
    {
        $this->deliveryEstimate = $deliveryEstimate;
    }

    /**
     * Greeting to include as part of the shipment. How to use this is fulfiller
     * dependent.
     *
     * @return null|Greeting Greeting to include as part of the shipment.
     */
    public function getGreeting(): ?Greeting
    {
        return $this->greeting;
    }

    /**
     * Greeting to include as part of the shipment. How to use this is fulfiller
     * dependent.
     *
     * @param null|Greeting $greeting Greeting to include as part of the shipment.
     */
    public function setGreeting(?Greeting $greeting): void
    {
        $this->greeting = $greeting;
    }

    /**
     * List of codes indicating marketing inserts to include with shipments.
     * What a code means will be determined offline between Shutterfly and
     * fulfillers.
     *
     * @return null|string List of codes indicating marketing inserts to include with shipments.
     */
    public function getInsertCodes(): ?string
    {
        return $this->insertCodes;
    }

    /**
     * List of codes indicating marketing inserts to include with shipments.
     * What a code means will be determined offline between Shutterfly and
     * fulfillers.
     *
     * @param null|string $insertCodes List of codes indicating marketing inserts to include with shipments.
     */
    public function setInsertCodes(?string $insertCodes): void
    {
        $this->insertCodes = $insertCodes;
    }

    /**
     * Code indicating what type of packaging to use for shipments. What a code
     * means will be determined offline between Shutterfly and fulfillers.
     *
     * @return null|string Code indicating what type of packaging to use for shipments.
     */
    public function getPackagingCode(): ?string
    {
        return $this->packagingCode;
    }

    /**
     * Code indicating what type of packaging to use for shipments. What a code
     * means will be determined offline between Shutterfly and fulfillers.
     *
     * @param null|string $packagingCode Code indicating what type of packaging to use for shipments.
     */
    public function setPackagingCode(?string $packagingCode): void
    {
        $this->packagingCode = $packagingCode;
    }

    /**
     * Shipping address for all items in this suborder.
     *
     * @return Address Shipping address for all items in this suborder.
     */
    public function getShipAddress(): Address
    {
        return $this->shipAddress;
    }

    /**
     * Shipping address for all items in this suborder.
     *
     * @param Address $shipAddress Shipping address for all items in this suborder.
     */
    public function setShipAddress(Address $shipAddress): void
    {
        $this->shipAddress = $shipAddress;
    }

    /**
     * Deprecated in favor of “priority”. Boolean flag indicating the customer’s
     * order requires “rush” processing/handling.
     *
     * @return bool|null Boolean flag indicating the customer’s order requires “rush” processing/handling.
     */
    public function getRush(): ?bool
    {
        return $this->rush;
    }

    /**
     * Deprecated in favor of “priority”. Boolean flag indicating the customer’s
     * order requires “rush” processing/handling.
     *
     * @param bool|null $rush Boolean flag indicating the customer’s order requires “rush” processing/handling.
     */
    public function setRush(?bool $rush): void
    {
        $this->rush = $rush;
    }

    /**
     * Boolean flag indicating the customer’s order has additional fulfillers.
     *
     * @return bool|null Boolean flag indicating the customer’s order has additional fulfillers.
     */
    public function getAdditionalFulfillers(): ?bool
    {
        return $this->additionalFulfillers;
    }

    /**
     * Boolean flag indicating the customer’s order has additional fulfillers.
     *
     * @param bool|null $additionalFulfillers Boolean flag indicating the customer’s order has additional fulfillers.
     */
    public function setAdditionalFulfillers(?bool $additionalFulfillers): void
    {
        $this->additionalFulfillers = $additionalFulfillers;
    }
}