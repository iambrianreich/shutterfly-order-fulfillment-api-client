<?php
/**
 * This file contains the RWC\Shutterfly\ISubOrder class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */
namespace RWC\Shutterfly;

/**
 * Base SubOrder type.
 *
 * @package RWC\Shutterfly
 */
interface ISubOrder
{
    /**
     * Shutterfly assigned identifier for the suborder, unique within the scope of the order
     *
     * @return string Shutterfly assigned identifier for the suborder, unique within the scope of the order
     */
    public function getSubOrderNo(): string;

    /**
     * Shutterfly assigned identifier for the suborder, unique within the scope of the order
     *
     * @param string $subOrderNo Shutterfly assigned identifier for the suborder, unique within the scope of the order
     */
    public function setSubOrderNo(string $subOrderNo): void;

    /**
     * Designated shipping method for this suborder. These are logical values.
     * What specific carrier & service to use for each is determined offline
     * between Shutterfly and the fulfiller.
     *
     * @return string Designated shipping method for this suborder.
     */
    public function getShipMethod(): string;

    /**
     * Designated shipping method for this suborder. These are logical values.
     * What specific carrier & service to use for each is determined offline
     * between Shutterfly and the fulfiller.
     *
     * @param string $shipMethod Designated shipping method for this suborder.
     */
    public function setShipMethod(string $shipMethod): void;

    /**
     * Element indicating if customer’s order requires “rush” processing/handling.
     * Values: normal, super_rush, next_day
     *
     * @return null|Priority Element indicating if customer’s order requires “rush” processing/handling.
     */
    public function getPriority(): ?Priority;

    /**
     * Element indicating if customer’s order requires “rush” processing/handling.
     * Values: normal, super_rush, next_day
     *
     * @param null|Priority $priority Element indicating if customer’s order requires “rush” processing/handling.
     */
    public function setPriority(?Priority $priority): void;

    /**
     * Additional customization for the suborder.
     *
     * @return null|Customize Additional customization for the suborder.
     */
    public function getCustomize(): ?Customize;

    /**
     * Additional customization for the suborder.
     *
     * @param null|Customize $customize Additional customization for the suborder.
     */
    public function setCustomize(?Customize $customize): void;

    /**
     * List of items in this Suborder.
     *
     * @return Item[] List of items in this Suborder.
     */
    public function getItems(): array;

    /**
     * List of items in this Suborder.
     *
     * @param Item[] $items List of items in this Suborder.
     */
    public function setItems(array $items): void;
}