<?php


namespace RWC\Shutterfly;


class ShippingResponse
{
    /**
     * API Version, valid values: 1.0
     *
     * @var int
     */
    protected $version;

    /**
     * The orderNo received in the request.
     *
     * @var string
     */
    protected $orderNo;

    /**
     * The carrier tracking number for this shipment. This value will only be
     * filled in for multi-parcel shipments and only if a label was requested.
     *
     * @var string|null
     */
    protected $trackingNo;

    /**
     * URL used to determine the status of the shipment. Will only be populated
     * if the trackingNo is populated.
     *
     * @var string|null
     */
    protected $trackingUrl;

    /**
     * List of ShipmentResponse types, see section 4.2.1.
     *
     * @var ShipmentResponse[]
     */
    protected $shipmentResponses;

    /**
     * Customize element, see section 9.2.
     *
     * @var Customize|null
     */
    protected $customize;

    /**
     * Returns the version number.
     *
     * @return int Returns the version number.
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * Sets the API version.
     *
     * @param int $version The API version.
     * @return ShippingResponse Returns a fluid interface.
     */
    public function setVersion(int $version): ShippingResponse
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Returns the order number.
     *
     * @return string Returns the order number.
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * Sets the order number.
     *
     * @param string $orderNo The order number.
     * @return ShippingResponse Returns a fluid interface.
     */
    public function setOrderNo(string $orderNo): ShippingResponse
    {
        $this->orderNo = $orderNo;
        return $this;
    }

    /**
     * Returns the tracking number.
     *
     * @return string|null Returns the tracking number.
     */
    public function getTrackingNo(): ?string
    {
        return $this->trackingNo;
    }

    /**
     * Sets the tracking number.
     *
     * @param string|null $trackingNo The tracking number.
     * @return ShippingResponse Returns a fluid interface.
     */
    public function setTrackingNo(?string $trackingNo): ShippingResponse
    {
        $this->trackingNo = $trackingNo;
        return $this;
    }

    /**
     * Returns the tracking url.
     *
     * @return string|null Returns the tracking url.
     */
    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    /**
     * Sets the tracking url.
     *
     * @param string|null $trackingUrl The tracking url.
     * @return ShippingResponse Returns a fluid interface.
     */
    public function setTrackingUrl(?string $trackingUrl): ShippingResponse
    {
        $this->trackingUrl = $trackingUrl;
        return $this;
    }

    /**
     * Returns the ShipmentResponses.
     *
     * @return ShipmentResponse[] Returns the ShipmentResponses.
     */
    public function getShipmentResponses(): array
    {
        return $this->shipmentResponses;
    }

    /**
     * Sets the ShipmentResponses.
     *
     * @param ShipmentResponse[] $shipmentResponses The ShipmentResponses.
     * @return ShippingResponse Returns a fluid interface.
     */
    public function setShipmentResponses(array $shipmentResponses): ShippingResponse
    {
        $this->shipmentResponses = $shipmentResponses;
        return $this;
    }

    /**
     * Returns the customize block.
     *
     * @return Customize|null Returns the customize block.
     */
    public function getCustomize(): ?Customize
    {
        return $this->customize;
    }

    /**
     * Sets the Customize block.
     *
     * @param Customize|null $customize The Customize block.
     * @return ShippingResponse Returns a fluid interface.
     */
    public function setCustomize(?Customize $customize): ShippingResponse
    {
        $this->customize = $customize;
        return $this;
    }
}