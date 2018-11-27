<?php
/**
 * This file contains the RWC\Shutterfly\Constraints\HasUniqueShipmentIdentifier class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */

namespace RWC\Shutterfly\Constraints;

/**
 * A shipment may appear before the final update only if it has a unique
 * shipment identifier. The scope of the uniqueness is within the order. If a
 * fulfiller does not use shipment identifiers, shipments may only appear in
 * the final status update.
 *
 * @package RWC\Shutterfly\Constraints
 */
class HasUniqueShipmentIdentifier
{
    public function isValid() : bool
    {
        // TODO Finish
        return false;
    }
}