<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 1:22 PM
 */

namespace RWC\Shutterfly;


use RWC\Shutterfly\Extensions\IExtension;
use RWC\Shutterfly\Status\IStatus;

class OrderStatus
{
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
     * @var Status\Item[]|null
     */
    protected $statusItems;

    /**
     * List of shipments. See section 8.3.1, “ShipmentType Elements”
     *
     * @var Shipment[]|null
     */
    protected $shipments;

    /**
     * List of reroutes. See section 8.4.1, “ReroutedType Elements”
     *
     * @var Reroute[]|null
     */
    protected $reroutes;

    /**
     * List of rejections. See section 8.5.1, “RejectedType Elements”
     *
     * @var Rejection[]|null
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
     * @param string $orderNo
     * @param null|string $fulfillerOrderNo
     * @param bool|null $testStatus
     * @param IStatus $status
     * @param null|string $message
     * @param null|string $moreInfo
     * @param null|Status\Item[] $statusItems
     * @param null|Shipment[] $shipments
     * @param null|Reroute[] $reroutes
     * @param null|Rejection[] $rejections
     * @param null|IExtension $extension
     */
    public function __construct(
        string $orderNo,
        ?string $fulfillerOrderNo,
        ?bool $testStatus,
        IStatus $status,
        ?string $message,
        ?string $moreInfo,
        ?array $statusItems,
        ?array $shipments,
        ?array $reroutes,
        ?array $rejections,
        ?IExtension $extension
    ) {
        $this->setVersion(new Version());
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
     * @return string Shutterfly protocol version, currently “3.0”
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Shutterfly protocol version, currently “3.0”
     *
     * @param string $version Shutterfly protocol version, currently “3.0”
     */
    protected function setVersion(string $version): void
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
     * @return StatusItem[]|null List of items this status applies to.
     */
    public function getStatusItems(): ?array
    {
        return $this->statusItems;
    }

    /**
     * List of items this status applies to.
     *
     * @param StatusItem[]|null $statusItems List of items this status applies to.
     */
    public function setStatusItems(?array $statusItems): void
    {
        $this->statusItems = $statusItems;
    }

    /**
     * List of Shipments.
     *
     * @return Shipment[]|null List of shipments.
     */
    public function getShipments(): ?array
    {
        return $this->shipments;
    }

    /**
     * @param Shipment[]|null $shipments
     */
    public function setShipments(?array $shipments): void
    {
        $this->shipments = $shipments;
    }

    /**
     * List of reroutes.
     *
     * @return Reroute[]|null List of reroutes.
     */
    public function getReroutes(): ?array
    {
        return $this->reroutes;
    }

    /**
     * List of reroutes.
     *
     * @param Reroute[]|null $reroutes List of reroutes.
     */
    public function setReroutes(?array $reroutes): void
    {
        $this->reroutes = $reroutes;
    }

    /**
     * List of rejections.
     *
     * @return Rejection[]|null List of rejections.
     */
    public function getRejections(): ?array
    {
        return $this->rejections;
    }

    /**
     * List of rejections. See section 8.5.1, “RejectedType Elements”
     *
     * @param Rejection[]|null $rejections List of rejections.
     */
    public function setRejections(?array $rejections): void
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
}