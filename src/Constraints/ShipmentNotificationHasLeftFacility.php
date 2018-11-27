<?php
/**
 * This file contains the RWC\Shutterfly\Constraints\ShipmentNotificationHasLeftFacility class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */
namespace RWC\Shutterfly\Constraints;

/**
 * Notification of a shipment should not be sent until the shipment has left
 * the fulfiller’s facility. This is for two reasons. First, Shutterfly informs
 * the customer that their items have actually shipped. For a good customer
 * experience, it is strongly preferred that this actually be true. Second,
 * Shutterfly may recognize the revenue for the shipped items, and cannot
 * legally do so unless the items have actually shipped.
 *
 * @package RWC\Shutterfly\Constraints
 */
class ShipmentNotificationHasLeftFacility
{
    public function isValid() : bool
    {
        // TODO Finish
        return false;
    }
}