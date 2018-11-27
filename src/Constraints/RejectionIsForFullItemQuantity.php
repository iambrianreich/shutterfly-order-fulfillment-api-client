<?php
/**
 * This file contains the RWC\Shutterfly\Constraints\RejectionIsForFullItemQuantity class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */

namespace RWC\Shutterfly\Constraints;

/**
 * When rejecting an item, the entire remaining unfulfilled quantity of the
 * item must be rejected.
 *
 * @package RWC\Shutterfly\Constraints
 */
class RejectionIsForFullItemQuantity
{
    public function isValid() : bool
    {
        // TODO Finish
        return false;
    }
}