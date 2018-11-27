<?php
/**
 * This file contains the RWC\Shutterfly\Order class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */

namespace RWC\Shutterfly;

/**
 * An Order is a Shutterfly order submitted to a fulfiller.
 *
 * @package RWC\Shutterfly
 */
class Order
{
    /**
     * Shutterfly protocol version, currently “3.0”
     *
     * @var string
     */
    protected $version = '3.0';

    /**
     * Shutterfly assigned unique identifier for this order.
     *
     * @var string
     */
    protected $orderNo;

    /**
     * Timestamp when order was created.
     *
     * @var int
     */
    protected $orderDate;

    /**
     * Instructions on how to process the order.
     *
     * @var Processing
     */
    protected $processing;

    /**
     * Information about the customer that placed the order. This info will
     * only be sent to Shutterfly labs.
     *
     * @var null|Orderer
     */
    protected $orderer;

    /**
     * Additional customization for the order.
     *
     * @var null|Customize
     */
    protected $customize;

    /**
     * List of suborders in this order.
     *
     * @var SubOrder[]
     */
    protected $suborders;

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * @param string $orderNo
     */
    public function setOrderNo(string $orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    /**
     * @return int
     */
    public function getOrderDate(): int
    {
        return $this->orderDate;
    }

    /**
     * @param int $orderDate
     */
    public function setOrderDate(int $orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return Processing
     */
    public function getProcessing(): Processing
    {
        return $this->processing;
    }

    /**
     * @param Processing $processing
     */
    public function setProcessing(Processing $processing): void
    {
        $this->processing = $processing;
    }

    /**
     * Information about the customer that placed the order.
     *
     * @return null|Orderer Information about the customer that placed the order.
     */
    public function getOrderer(): ?Orderer
    {
        return $this->orderer;
    }

    /**
     * Information about the customer that placed the order.
     *
     * @param null|Orderer $orderer Information about the customer that placed the order.
     */
    public function setOrderer(?Orderer $orderer): void
    {
        $this->orderer = $orderer;
    }

    /**
     * Additional customization for the order.
     *
     * @return null|Customize Additional customization for the order.
     */
    public function getCustomize(): ?Customize
    {
        return $this->customize;
    }

    /**
     * Additional customization for the order.
     *
     * @param null|Customize $customize Additional customization for the order.
     */
    public function setCustomize(?Customize $customize): void
    {
        $this->customize = $customize;
    }

    /**
     * List of suborders in this order.
     *
     * @return SubOrder[] List of suborders in this order.
     */
    public function getSuborders(): array
    {
        return $this->suborders;
    }

    /**
     * List of suborders in this order.
     *
     * @param SubOrder[] $suborders List of suborders in this order.
     */
    public function setSuborders(array $suborders): void
    {
        $this->suborders = $suborders;
    }
}
