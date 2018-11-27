<?php
/**
 * This file contains the RWC\Shutterfly\Constraints\ContainsOnlyCompleteItems class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */
namespace RWC\Shutterfly\Constraints;

/**
 * Status updates may include any known completed items. Fulfillers may report
 * on items that have completed since the last update, as well as any that were
 * reported in previous updates.
 *
 * @package RWC\Shutterfly\Constaints
 */
class ContainsOnlyCompleteItems
{
    public function isValid() : bool
    {
        // TODO Finish
        return false;
    }
}