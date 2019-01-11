<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 1:22 PM
 */

namespace RWC\Shutterfly;


use DOMDocument;
use DOMElement;
use RWC\Shutterfly\Extensions\IExtension;
use RWC\Shutterfly\Status\Complete;
use RWC\Shutterfly\Status\DoneProc;
use RWC\Shutterfly\Status\ImagesReceived;
use RWC\Shutterfly\Status\IStatus;
use RWC\Shutterfly\Status\OrderReceived;
use RWC\Shutterfly\Status\OrderRouted;
use RWC\Shutterfly\Status\OrderUploaded;
use RWC\Shutterfly\Status\Processing;
use RWC\Shutterfly\Status\ReadyToShip;

class OrderStatus extends AbstractXmlFragment implements IXmlDocument
{
    /**
     * XML Namespace for OrderStatus
     */
    const XML_NAMESPACE = 'http://www.shutterfly.com/orderv3/status';

    /**
     *  The XML version.
     *
     * @var Version
     */
    protected $version;

    /**
     * Shutterfly specified order identifier. Same as orderNo in Order XML.
     *
     * @var string
     */
    protected $orderNo;

    /**
     * Fulfiller specified order identifier. If provided, this will only be
     * logged for diagnostic purposes, and not be persisted with other status
     * data.
     *
     * @var string|null
     */
    protected $fulfillerOrderNo;

    /**
     * Boolean flag indicating this is a test status update. Test status
     * updates will be checked for correctness, but not processed.
     *
     * @var bool|null
     */
    protected $testStatus;

    /**
     * Status of order. Must be one of the values in section 4.4, “Order Status”
     *
     * @var IStatus
     */
    protected $status;

    /**
     * Optional message providing additional info about the status. If provided,
     * this will only be logged for diagnostic purposes, and not be persisted
     * with other status data.
     *
     * @var string|null
     */
    protected $message;

    /**
     * Optional data relevant to status. Could contain an URL to access
     * additional data about the status of the order. See note below.
     *
     * @var string|null
     */
    protected $moreInfo;

    /**
     * List of items this status applies too. When present, there should not be
     * shipments, reroutes or rejections.
     *
     * @var StatusItems
     */
    protected $statusItems;

    /**
     * List of shipments. See section 8.3.1, “ShipmentType Elements”
     *
     * @var Shipments
     */
    protected $shipments;

    /**
     * List of reroutes. See section 8.4.1, “ReroutedType Elements”
     *
     * @var Reroutes|null
     */
    protected $reroutes;

    /**
     * List of rejections. See section 8.5.1, “RejectedType Elements”
     *
     * @var Rejections|null
     */
    protected $rejections;

    /**
     * Wrapper around fulfiller specific content. This element should only be
     * used in the status query protocol, not the status update protocol. See
     * note below.
     *
     * @var IExtension|null
     */
    protected $extension;

    /**
     * OrderStatus constructor.
     * @param Version|null $version
     * @param string $orderNo
     * @param null|string $fulfillerOrderNo
     * @param bool|null $testStatus
     * @param IStatus $status
     * @param null|string $message
     * @param null|string $moreInfo
     * @param StatusItems|null $statusItems
     * @param Shipments|null $shipments
     * @param Reroutes|null $reroutes
     * @param Rejections|null $rejections
     * @param null|IExtension $extension
     */
    public function __construct(
        ?Version $version,
        string $orderNo,
        ?string $fulfillerOrderNo,
        ?bool $testStatus,
        IStatus $status,
        ?string $message,
        ?string $moreInfo,
        ?StatusItems $statusItems,
        ?Shipments $shipments,
        ?Reroutes $reroutes,
        ?Rejections $rejections,
        ?IExtension $extension
    ) {
        $version = $version ?? Version::getCurrentVersion();
        $this->setVersion($version);
        $this->setOrderNo($orderNo);
        $this->setFulfillerOrderNo($fulfillerOrderNo);
        $this->setTestStatus($testStatus);
        $this->setStatus($status);
        $this->setMessage($message);
        $this->setMoreInfo($moreInfo);
        $this->setStatusItems($statusItems);
        $this->setShipments($shipments);
        $this->setReroutes($reroutes);
        $this->setRejections($rejections);
        $this->setExtension($extension);
    }


    /**
     * Shutterfly protocol version, currently “3.0”
     *
     * @return Version Shutterfly protocol version, currently “3.0”
     */
    public function getVersion(): Version
    {
        return $this->version;
    }

    /**
     * Shutterfly protocol version, currently “3.0”
     *
     * @param Version $version Shutterfly protocol version, currently “3.0”
     */
    protected function setVersion(Version $version): void
    {
        $this->version = $version;
    }

    /**
     * Shutterfly specified order identifier.
     *
     * @return string Shutterfly specified order identifier.
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * Shutterfly specified order identifier. Same as orderNo in Order XML.
     *
     * @param string $orderNo Shutterfly specified order identifier.
     */
    public function setOrderNo(string $orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    /**
     * Fulfiller specified order identifier. If provided, this will only be
     * logged for diagnostic purposes, and not be persisted with other status
     * data.
     *
     * @return null|string Fulfiller specified order identifier.
     */
    public function getFulfillerOrderNo(): ?string
    {
        return $this->fulfillerOrderNo;
    }

    /**
     * Fulfiller specified order identifier. If provided, this will only be
     * logged for diagnostic purposes, and not be persisted with other status
     * data.
     *
     * @param null|string $fulfillerOrderNo Fulfiller specified order identifier.
     */
    public function setFulfillerOrderNo(?string $fulfillerOrderNo): void
    {
        $this->fulfillerOrderNo = $fulfillerOrderNo;
    }

    /**
     * Boolean flag indicating this is a test status update. Test status
     * updates will be checked for correctness, but not processed.
     *
     * @return bool Boolean flag indicating this is a test status update.
     */
    public function isTestStatus(): bool
    {
        return $this->testStatus;
    }

    /**
     * Boolean flag indicating this is a test status update. Test status
     * updates will be checked for correctness, but not processed.
     *
     * @param bool|null $testStatus Boolean flag indicating this is a test status update.
     */
    public function setTestStatus(?bool $testStatus): void
    {
        $this->testStatus = $testStatus;
    }

    /**
     * Status of order. Must be one of the values in section 4.4,
     *
     * @return IStatus Status of order. Must be one of the values in section 4.4,
     */
    public function getStatus(): IStatus
    {
        return $this->status;
    }

    /**
     * Status of order. Must be one of the values in section 4.4.
     *
     * @param IStatus $status Status of order. Must be one of the values in section 4.4,
     */
    public function setStatus(IStatus $status): void
    {
        $this->status = $status;
    }

    /**
     * Optional message providing additional info about the status
     *
     * @return string|null Optional message providing additional info about the status.
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Optional message providing additional info about the status.
     *
     * @param string|null $message Optional message providing additional info about the status.
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * Optional data relevant to status.
     *
     * @return string|null Optional data relevant to status.
     */
    public function getMoreInfo(): ?string
    {
        return $this->moreInfo;
    }

    /**
     * Optional data relevant to status. Could contain an URL to access
     * additional data about the status of the order.
     *
     * @param string|null $moreInfo Optional data relevant to status.
     */
    public function setMoreInfo(?string $moreInfo): void
    {
        $this->moreInfo = $moreInfo;
    }

    /**
     * List of items this status applies to.
     *
     * @return StatusItems|null List of items this status applies to.
     */
    public function getStatusItems(): ?StatusItems
    {
        return $this->statusItems;
    }

    /**
     * List of items this status applies to.
     *
     * @param StatusItems|null $statusItems List of items this status applies to.
     */
    public function setStatusItems(?StatusItems $statusItems): void
    {
        $this->statusItems = $statusItems;
    }

    /**
     * List of Shipments.
     *
     * @return Shipments|null List of shipments.
     */
    public function getShipments(): ?Shipments
    {
        return $this->shipments;
    }

    /**
     * @param Shipments|null $shipments
     */
    public function setShipments(?Shipments $shipments) : void
    {
        $this->shipments = $shipments;
    }

    /**
     * List of reroutes.
     *
     * @return Reroutes|null List of reroutes.
     */
    public function getReroutes(): ?Reroutes
    {
        return $this->reroutes;
    }

    /**
     * List of reroutes.
     *
     * @param Reroutes|null $reroutes List of reroutes.
     */
    public function setReroutes(?Reroutes $reroutes): void
    {
        $this->reroutes = $reroutes;
    }

    /**
     * List of rejections.
     *
     * @return Rejections|null List of rejections.
     */
    public function getRejections(): ?Rejections
    {
        return $this->rejections;
    }

    /**
     * List of rejections. See section 8.5.1, “RejectedType Elements”
     *
     * @param Rejections|null $rejections List of rejections.
     */
    public function setRejections(?Rejections $rejections): void
    {
        $this->rejections = $rejections;
    }

    /**
     * Wrapper around fulfiller specific content. This element should only be
     * used in the status query protocol, not the status update protocol. See
     * note below.
     *
     * @return null|IExtension Wrapper around fulfiller specific content.
     */
    public function getExtension(): ?IExtension
    {
        return $this->extension;
    }

    /**
     * Wrapper around fulfiller specific content. This element should only be
     * used in the status query protocol, not the status update protocol. See
     * note below.
     *
     * @param null|IExtension $extension Wrapper around fulfiller specific content.
     */
    public function setExtension(?IExtension $extension): void
    {
        $this->extension = $extension;
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        $response = $element;
        if (! self::hasChild($response, 'version')) {
            throw new \InvalidArgumentException(
                '<version> is a required sub-element.'
            );
        }

        /** @var Version $version */
        $version = Version::fromDomElement(self::getFirstChild($response, 'version'));

        if(! self::hasChild($response, 'orderNo')) {
            throw new \InvalidArgumentException(
                '<orderNo> is a required sub-element'
            );
        }

        $orderNo = self::getFirstChild($response, 'orderNo')->textContent;

        $fulfillerOrderNo = null;

        // fulfillerOrderNo is an optional field.
        if (self::hasChild($response, 'fulfillerOrderNo')) {
            $fulfillerOrderNo = self::getFirstChild($response, 'fulfillerOrderNo')->textContent;
        }

        $testStatus = false;

        // testStatus is an optional field
        if (self::hasChild($response, 'testStatus')) {
            $value = strtolower(self::getFirstChild($response, 'testStatus')->textContent);
            $testStatus = ($value == 'true') ? true : false;
        }

        // status is a required field.
        if (! self::hasChild($response, 'status')) {
            throw new \InvalidArgumentException(
                '<status> is a required sub-element.'
            );
        }

        $status = self::getStatusFromString(self::getFirstChild($response, 'status'));

        // message is an optional field.
        $message = null;
        if (self::hasChild($response, 'message')) {
            $message = self::getFirstChild($response, 'message')->textContent;
        }

        // moreInfo is an optional field.
        $moreInfo = null;
        if (self::hasChild($response, 'moreInfo')) {
            $moreInfo = self::getFirstChild($response, 'moreInfo')->textContent;
        }

        // statusItems is optional.
        $statusItems = null;
        if (self::hasChild($response, 'statusItems')) {
            /** @var DOMElement[] $statusItemsEls */
            $statusItems = StatusItems::fromDomElement(
                self::getFirstChild($response, 'statusItems'));
        }

        // shipments is optional.
        $shipments = null;
        if (self::hasChild($response, 'shipments')) {
            /** @var DOMElement[] $statusItemsEls */
            $shipments = Shipments::fromDomElement(
               self::getFirstChild($response, 'shipments'));
        }

        // reroutes is optional.
        $reroutes = null;
        if (self::hasChild($response, 'reroutes')) {
           $reroutesEl = self::getFirstChild($response, 'reroutes');
           $reroutes = Rerouted::fromDomElement($reroutesEl);
        }

        $rejections = null;
        if (self::hasChild($response, 'rejections')) {
            $rejectionsEl = self::getFirstChild($response, 'rejections');
            $rejections = Rejections::fromDomElement($rejectionsEl);
        }

        // extension is optional
        $extension = null;
        if (self::hasChild($response, 'extension')) {
            $extensionEl = self::getFirstChild($response, 'extension');
            $extension = Extension::fromDomElement($extensionEl);
        }

        return new OrderStatus(
            $version,
            $orderNo,
            $fulfillerOrderNo,
            $testStatus,
            $status,
            $message,
            $moreInfo,
            $statusItems,
            $shipments,
            $reroutes,
            $rejections,
            $extension
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
        $orderStatusEl = $document->createElement('orderStatus');
        $orderStatusEl->appendChild($this->getVersion()->toDomElement($document));
        $orderStatusEl->appendChild($document->createElement('orderNo', $this->getOrderNo()));

        // fulfillerOrderNo is optional
        if (! empty($this->getFulfillerOrderNo())) {
            $orderStatusEl->appendChild($document->createElement(
                'fulfillerOrderNo',
                $this->getFulfillerOrderNo()
            ));
        }

        // testStatus is optional.
        if ($this->isTestStatus()) {
            $orderStatusEl->appendChild($document->createElement(
                'testStatus', 'true'
            ));
        }

        $orderStatusEl->appendChild($document->createElement(
            'status',
            $this->getStatus()->getCode()
        ));

        // message is optional
        if (! empty($this->getMessage())) {
            $orderStatusEl->appendChild($document->createElement(
                'message',
                    $this->getMessage()
            ));
        }

        // moreInfo is optional
        if (! empty($this->getMoreInfo())) {
            $orderStatusEl->appendChild($document->createElement(
                'moreInfo',
                $this->$this->getMoreInfo()
            ));
        }

        // Only output statusItems if it's not empty.
        if ($this->getStatusItems() != null && $this->getStatusItems()->hasItems()) {
            $orderStatusEl->appendChild(
                $this->getStatusItems()->toDomElement($document));
        }

        // Only output shipments if it's not empty
        if ($this->getShipments() != null && $this->getShipments()->hasShipments()) {
            $orderStatusEl->appendChild($this->getShipments()->toDomElement($document));
        }

        // Only output reroutes if it's not empty
        if ($this->getReroutes() != null && $this->getReroutes()->hasItems()) {
            $orderStatusEl->appendChild($this->getReroutes()->toDomElement($document));
        }

        // Only output rejections if it's not empty.
        if ($this->getRejections() != null && $this->getRejections()->hasItems()) {
            $orderStatusEl->appendChild($this->getRejections()->toDomElement($document));
        }

        if($this->getExtension() != null) {
            $orderStatusEl->appendChild($this->getExtension()->toDomElement($document));
        }

        return $orderStatusEl;
    }

    /**
     * Converts an XML string into the IXmlDocument.
     *
     * @param string $xml The XML string
     * @return IXmlDocument Returns the document type.
     */
    public static function fromXmlString(string $xml): IXmlDocument
    {
        $document = new DOMDocument();
        $document->loadXML($xml);

        $orderStatusEl = $document->documentElement;

        if ($orderStatusEl->nodeName != 'orderStatus') {
            throw new \InvalidArgumentException(
                'Expected an "orderStatus" node'
            );
        }

        /** @var OrderStatus $orderStatus */
        $orderStatus = self::fromDomElement($orderStatusEl);
        return $orderStatus;
    }

    /**
     * Returns the Document as a DOMDocument.
     *
     * @return DOMDocument Returns the Document as a DOMDocument.
     */
    public function toDomDocument(): DOMDocument
    {
        $document = new DOMDocument();
        $document->appendChild($this->toDomElement($document));
        $document->documentElement->setAttribute('xmlns', self::XML_NAMESPACE);
        return $document;
    }

    /**
     * Returns the document as XML.
     *
     * @return string Returns the document as XML.
     */
    public function toXml(): string
    {
        return $this->toDomDocument()->saveXML();
    }

    /**
     * Returns an IStatus for the specified status code.
     *
     * @param string $status The status code.
     * @return IStatus Returns the equivalent IStatus.
     * @throws \InvalidArgumentException if the status code is unsupported.
     */
    private static function getStatusFromString(string $status) : IStatus
    {
        switch ($status) {
            case 'ORDER_ROUTED' : return new OrderRouted();
            case 'ORDER_UPLOADED' : return new OrderUploaded();
            case 'ORDER_RECV' : return new OrderReceived();
            case 'IMAGES_RECV' : return new ImagesReceived();
            case 'PROCESSING' : return new Processing();
            case 'READY_TO_SHIP': return new ReadyToShip();
            case 'DONE_PROC': return new DoneProc();
            case 'COMPLETE' : return new Complete();
            default: throw new \InvalidArgumentException(
                "$status is not a supported status code."
            );
        }
    }
}