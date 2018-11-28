<?php
/**
 * This file contains the RWC\Shutterfly\AbstractSubOrder class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */
namespace RWC\Shutterfly;

/**
 * Base class for SubOrders.
 *
 * @package RWC\Shutterfly
 */
class AbstractSubOrder implements ISubOrder
{
    /**
     * Shutterfly assigned identifier for the suborder, unique within the scope
     * of the order
     *
     * @var string
     */
    protected $subOrderNo;

    /**
     * Designated shipping method for this suborder. These are logical values.
     * What specific carrier & service to use for each is determined offline
     * between Shutterfly and the fulfiller.
     *
     * @var string
     */
    protected $shipMethod;

    /**
     * Element indicating if customer’s order requires “rush”
     * processing/handling. Values: normal, super_rush, next_day.
     *
     * @var null|Priority
     */
    protected $priority;

    /**
     * Additional customization for the suborder.
     *
     * @var Customize|null
     */
    protected $customize;

    /**
     * List of items in this suborder.
     *
     * @var Item[]
     */
    protected $items;

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
     * Designated shipping method for this suborder. These are logical values.
     * What specific carrier & service to use for each is determined offline
     * between Shutterfly and the fulfiller.
     *
     * @return string Designated shipping method for this suborder.
     */
    public function getShipMethod(): string
    {
        return $this->shipMethod;
    }

    /**
     * Designated shipping method for this suborder. These are logical values.
     * What specific carrier & service to use for each is determined offline
     * between Shutterfly and the fulfiller.
     *
     * @param string $shipMethod Designated shipping method for this suborder.
     */
    public function setShipMethod(string $shipMethod): void
    {
        $this->shipMethod = $shipMethod;
    }


    /**
     * Element indicating if customer’s order requires “rush” processing/handling.
     * Values: normal, super_rush, next_day
     *
     * @return null|Priority Element indicating if customer’s order requires “rush” processing/handling.
     */
    public function getPriority(): ?Priority
    {
        return $this->priority;
    }

    /**
     * Element indicating if customer’s order requires “rush” processing/handling.
     * Values: normal, super_rush, next_day
     *
     * @param null|Priority $priority Element indicating if customer’s order requires “rush” processing/handling.
     */
    public function setPriority(?Priority $priority): void
    {
        $this->priority = $priority;
    }


    /**
     * Additional customization for the suborder.
     *
     * @return null|Customize Additional customization for the suborder.
     */
    public function getCustomize(): ?Customize
    {
        return $this->customize;
    }

    /**
     * Additional customization for the suborder.
     *
     * @param null|Customize $customize Additional customization for the suborder.
     */
    public function setCustomize(?Customize $customize): void
    {
        $this->customize = $customize;
    }


    /**
     * List of items in this Suborder.
     *
     * @return Item[] List of items in this Suborder.
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * List of items in this Suborder.
     *
     * @param Item[] $items List of items in this Suborder.
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }
}