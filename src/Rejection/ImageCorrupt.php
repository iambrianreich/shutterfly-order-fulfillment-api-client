<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 3:24 PM
 */

namespace RWC\Shutterfly\Rejection;


class ImageCorrupt extends AbstractReason
{
    public function __construct()
    {
        $this->setCode('IMAGE_CORRUPT');
        $this->setDescription('One or more images in the item was corrupted');
    }
}