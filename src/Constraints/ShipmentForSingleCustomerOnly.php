<?php
/**
 * This file contains the RWC\Shutterfly\Constraints\ShipmentForSingleCustomerOnly class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */
namespace RWC\Shutterfly\Constraints;

/**
 * A shipment must not contain items for more than one recipient.
 *
 * @package RWC\Shutterfly\Constraints
 */
class ShipmentForSingleCustomerOnly
{
    public function isValid() : bool
    {
        // TODO Finish
        return false;
    }
}