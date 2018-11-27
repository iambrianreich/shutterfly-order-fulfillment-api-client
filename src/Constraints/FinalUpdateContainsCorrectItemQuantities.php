<?php
/**
 * This file contains the RWC\Shutterfly\Constraints\FinalUpdateContainsCorrectItemQuantities class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */
namespace RWC\Shutterfly\Constraints;

/**
 * The final update should not indicate that the total completed quantity of
 * an item is less than the ordered quantity.
 *
 * @package RWC\Shutterfly\Constraints
 */
class FinalUpdateContainsCorrectItemQuantities
{
    public function isValid() : bool
    {
        // TODO Finish
        return false;
    }
}