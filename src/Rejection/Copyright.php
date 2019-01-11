<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 3:24 PM
 */

namespace RWC\Shutterfly\Rejection;


class Copyright extends AbstractReason
{
    public function __construct()
    {
        $this->setCode('COPYRIGHT');
        $this->setReason('One or more images in the item violates copyright laws.');
    }
}