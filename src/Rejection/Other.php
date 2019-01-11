<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 3:24 PM
 */

namespace RWC\Shutterfly\Rejection;


class Other extends AbstractReason
{
    public function __construct()
    {
        $this->setCode('OTHER');
        $this->setReason('Any other reason for rejecting an item.)');
    }
}