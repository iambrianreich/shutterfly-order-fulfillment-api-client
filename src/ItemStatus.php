<?php
/**
 * This file contains the RWC\Shutterfly\ItemStatus class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */

namespace RWC\Shutterfly;

/**
 * Each item in an order has one of the statuses listed in the table below.
 * Every status other than “Open” is considered to be “complete”. An order
 * should only be considered complete when all its items are complete.
 *
 * @package RWC\Shutterfly
 */
class ItemStatus
{
    /**
     * This is the initial status, and the status for as long as the fulfiller
     * is attempting to fulfill the item
     */
    const OPEN = 'Open';

    /**
     * The full requested quantity of the item has been shipped to the customer
     */
    const SHIPPED = 'Shipped';

    /**
     * The item is not fulfillable due to bad data, copyright issues, etc.
     */
    const REJECTED = 'Rejected';

    /**
     * The item will not be fulfilled. Shutterfly should find another fulfiller
     * for the item
     */
    const REROUTED = 'Rerouted';

    /**
     * Returns true if the specified item status value is a complete status.
     * A complete status is Shipped, Rejected, or Rerouted.
     *
     * @param string $status The status to check for completeness.
     *
     * @return bool Returns true if the status is a complete status.
     */
    public static function isComplete(string $status) : bool
    {
        $complete = [ self::SHIPPED, self::REJECTED, self::REROUTED ];
        return in_array($status, $complete);
    }
}