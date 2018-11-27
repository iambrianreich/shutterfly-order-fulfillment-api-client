<?php
/**
 * This file contains the RWC\Shutterfly\Constraints\ItemTotalsDoNotExceedOrderedTotals class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */
namespace RWC\Shutterfly\Constraints;

/**
 * A status update should not indicate that the total completed quantity of an
 * item is greater than the ordered quantity. This will not be enforced as a
 * constraint. If, for example, a customer ordered 25 cards, and 50 were
 * shipped, the fulfiller should report this, and Shutterfly will record this
 * fact in its database. Shutterfly’s operations team will deal with the
 * problem as part of invoice reconciliation.
 *
 * @package RWC\Shutterfly\Constraints
 */
class ItemTotalsDoNotExceedOrderedTotals
{
    public function isValid() : bool
    {
        // TODO Finish
        return false;
    }
}