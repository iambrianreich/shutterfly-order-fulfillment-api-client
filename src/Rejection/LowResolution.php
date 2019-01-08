<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 3:24 PM
 */

namespace RWC\Shutterfly\Rejection;


class LowResolution extends AbstractReason
{
    public function __construct()
    {
        $this->setCode('LOW_RESOLUTION');
        $this->setDescription('One or more images in the item was judged to have too low a resolution to print.');
    }
}