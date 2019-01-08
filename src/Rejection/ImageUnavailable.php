<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 3:24 PM
 */

namespace RWC\Shutterfly\Rejection;


class ImageUnavailable extends AbstractReason
{
    public function __construct()
    {
        $this->setCode('IMAGE_UNAVAIL');
        $this->setDescription('One or more images in the item could not be retrieved from Shutterfly.');
    }
}