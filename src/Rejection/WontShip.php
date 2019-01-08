<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 3:24 PM
 */

namespace RWC\Shutterfly\Rejection;


class WontShip extends AbstractReason
{
    public function __construct()
    {
        $this->setCode('WONT_SHIP');
        $this->setDescription('Fulfiller doesn’t ship to the destination address specified for the item (PO Box, embargoed countries, etc.)');
    }
}