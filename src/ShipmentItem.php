<?php


namespace RWC\Shutterfly;


class ShipmentItem
{
    /**
     * The itemNo as received from the order xml.
     *
     * @var string
     */
    protected $itemNo;

    /**
     * Quantity of items in the shipment.
     *
     * @var int
     */
    protected $quantity;

    /**
     * HTS ("Harmonized") code provided for export handling. Required for
     * international shipments.
     *
     * @var string|null
     */
    protected $htsCode;

    /**
     * Country of the originating source products. 2-character ISO country
     * code. Required for international shipments.
     *
     * @var string|null
     */
    protected $countryOfOrigin;

    /**
     * Returns the item number as specified in the order XML.
     *
     * @return string Returns the item number as specified in the order XML.
     */
    public function getItemNo(): string
    {
        return $this->itemNo;
    }

    /**
     * Sets the item number as specified in the order XML.
     *
     * @param string $itemNo The item number as specified in the order XML.
     * @return ShipmentItem Returns a fluid interface.
     */
    public function setItemNo(string $itemNo): ShipmentItem
    {
        $this->itemNo = $itemNo;
        return $this;
    }

    /**
     * Returns the quantity of the items in the shipment.
     *
     * @return int Returns the quantity of the item in this shipment.
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Sets the quantity of the item in this shipment.
     *
     * @param int $quantity  The quantity of the item in the shipment.
     * @return ShipmentItem Returns a fluid interface.
     */
    public function setQuantity(int $quantity): ShipmentItem
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Returns the HTS code for the item.
     *
     * @return string|null Returns the HTS code for the item.
     */
    public function getHtsCode(): ?string
    {
        return $this->htsCode;
    }

    /**
     * Sets the HTS (harmonized) code for the item. Required for international
     * shipments.
     *
     * @param string|null $htsCode The HTS code of the item.
     * @return ShipmentItem Returns a fluid interface.
     */
    public function setHtsCode(?string $htsCode): ShipmentItem
    {
        $this->htsCode = $htsCode;
        return $this;
    }

    /**
     * Returns the country of origin code.
     *
     * @return string|null Returns the country of origin code.
     */
    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }

    /**
     * Sets the country of origin code. Required for international shipments.
     *
     * @param string|null $countryOfOrigin Country of origin code (ISO).
     * @return ShipmentItem Returns a fluid interface.
     */
    public function setCountryOfOrigin(?string $countryOfOrigin): ShipmentItem
    {
        $this->countryOfOrigin = $countryOfOrigin;
        return $this;
    }
}