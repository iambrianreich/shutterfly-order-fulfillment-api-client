<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 10:38 PM
 */

namespace RWC\Shutterfly;

class ShippingRequest
{
    /**
     * Default API version.
     */
    const DEFAULT_VERSION = '1.0';

    /**
     * Label type for ZPL labels.
     */
    const LABEL_TYPE_ZPL = 'ZPL';

    /**
     * Label type for ZPL 300 labels.
     */
    const LABEL_TYPE_ZPL_300 = 'ZPL_300';

    /**
     * The Shutterfly API version.
     *
     * @var string
     */
    protected $version = self::DEFAULT_VERSION;
    
    /**
     * Fulfiller order number.
     * 
     * @var string
     */
    protected $orderNo;

    /**
     * Optional billing code associated with this shipment.
     *
     * @var string|null
     */
    protected $billingCode;

    /**
     * Optional indicator requesting a label containing custom information,
     * such as a product logo, as agreed with Shutterfly team.
     * 
     * @var string|null
     */
    protected $labelCode;

    /**
     * Optional indicator requesting a label type other than the default ZPL.
     * Supported types: ZPL, ZPL_300
     * 
     * @param string|null
     */
    protected $labelType;

    /**
     * Indicator for grouping a set of shipments for a given fulfiller. Can be
     * used as an option for specifying shipments to close during the Close
     * Shipments process, see Section 5 for more detail.
     * 
     * @var string|null
     */
    protected $manifestNumber;

    /**
     * Optional export license values for international shipments
     * 
     * @var string|null
     */
    protected $exportLicenseNumber;

    /**
     * List of ShipmentRequest entries, see section 4.1.1; there should be
     * one for each package/parcel in the request
     * 
     * @var ShipmentRequest[]
     */
    protected $shipmentRequests;

    /**
     * Customize element, see section 9.2
     * 
     * @var Customize
     */
    protected $customize;

    /**
     * Sets the Shutterfly Shipping APi version number. Default to the
     * DEFAULT_VERSION constant.
     * 
     * @param string $version The Shutterfly API version number being targeted.
     * @return ShippingRequest Returns a fluid interface.
     */
    public function setVersion(string $version) : ShippingRequest
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Returns the API version number.
     * 
     * @return string Returns the API version number.
     */
    public function getVersion() : string
    {
        return $this->version;
    }

    /**
     * Sets the fulfiller order number.
     * 
     * @param string $orderNumber The fulfiller order number.
     * @return ShippingRequest Returns a fluid interface.
     */
    public function setOrderNumber(string $orderNumber) : ShippingRequest
    {
        $this->orderNo = $orderNumber;
        return $this;
    }

    /**
     * Returns the fulfiller order number.
     * 
     * @return string Returns the fulfiller order number.
     */
    public function getOrderNumber() : string
    {
        return $this->orderNo;
    }

    /**
     * Sets the billing code.
     * 
     * @param null|string $billingCode The billing code.
     * @return ShippingRequest Returns a fluid interface.
     */
    public function setBillingCode(?string $billingCode) : ShippingRequest
    {
        $this->billingCode = $billingCode;
        return $this;
    }

    /**
     * Returns the optional billing code.
     * 
     * @return string|null Returns the optional billing code.
     */
    public function getBillingCode() : ?string
    {
        return $this->billingCode;
    }

    /**
     * Sets the optional label code. This is to be worked out between
     * the fulfiller and Shutterfly prior to using a custom label code in
     * a request.
     * 
     * @param string|null $labelCode The optional label code.
     * @return ShippingRequest Returns a fluid interface.
     */
    public function  setLabelCode(?string $labelCode) : ShippingRequest
    {
        $this->labelCode = $labelCode;
        return $this;
    }

    /**
     * Returns the optional label code.
     * 
     * @return string|null Returns the optional label code.
     */
    public function getLabelCode() : ?string
    {
        return $this->labelCode;
    }

    /**
     * Sets the label type. By default this is ZPL. Use one of the
     * LABEL_TYPE_* constants.
     * 
     * @param string $labelType The label type being requested.
     * @return ShippingRequest Returns a fluid interface.
     */
    public function setLabelType(string $labelType) : ShippingRequest
    {
        $this->labelType = $labelType;
        return $this;
    }

    /**
     * Returns the label type.
     * 
     * @return string Returns the label type.
     */
    public function getLabelType() : string
    {
        return $this->labelType;
    }

    /**
     * Indicator for grouping a set of shipments for a given fulfiller. Can be
     * used as an option for specifying shipments to close during the Close
     * Shipments process, see Section 5 for more detail.
     * 
     * @param string|null $manifestNumber The optional manifest number.
     * @return ShippingRequest Returns a fluid interface.
     */
    public function setManifestNumber(?string $manifestNumber) : ShippingRequest
    {
        $this->manifestNumber = $manifestNumber;
        return $this;
    }

    /**
     * Returns the optional manifest number.
     * 
     * @return string|null Returns the optional manifest number.
     */
    public function getManifestNumber() : ?string
    {
        return $this->manifestNumber;
    }

    /**
     * Sets the optional export license values for international shipments.
     * 
     * @param string|null $exportLicenseNumber Optional export license number.
     * @return ShippingRequest Returns a fluid interface.
     */
    public function setExportLicenseNumber(?string $exportLicenseNumber) : ShippingRequest
    {
        $this->exportLicenseNumber = $exportLicenseNumber;
        return $this;
    }

    /**
     * Returns the optional export license number.
     * 
     * @return string|null Returns the optional export license number.
     */
    public function getExportLicenseNumber() : ?string
    {
        return $this->exportLicenseNumber;
    }

    /**
     * List of ShipmentRequest entries, see section 4.1.1; there should be
     * one for each package/parcel in the request
     * 
     * @param ShipmentRequest[] $shipmentRequests The shipment requests.
     * @return ShippingRequest Returns a fluid interface.
     */
    public function setShipmentRequests(array $shipmentRequests) : ShippingRequest
    {
        $this->shipmentRequests = $shipmentRequests;
        return $this;
    }

    /**
     * Returns an array of the associated ShipmentRequests.
     * 
     * @return ShipmentRequest[] Returns the ShipmentRequests.
     */
    public function getShipmentRequests() : array
    {
        return $this->shipmentRequests;
    }

    /**
     * Sets optional customizations. Customizations must be agreed on offline
     * by shutterfly and the fulfiller before sending in a request.
     * 
     * @param Customize|null The optional customizations.
     * @return ShippingRequest Returns a fluid interface.
     */
    public function setCustomize(?Customzize $customize = null) : ShippingRequest
    {
        $this->customize = $customize;
        return $this;
    }

    /**
     * Returns optional customizations.
     * 
     * @return Customize|null Returns optional customizations.
     */
    public function getCustomize() : ?Customize
    {
        return $this->customize;
    }
}