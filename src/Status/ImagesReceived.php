<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:39 PM
 */

namespace RWC\Shutterfly\Status;


class ImagesReceived extends AbstractStatus
{
    public function __construct()
    {
        $this->setCode('IMAGES_RECV');
        $this->setDescription('All images required for the order/item have been successfully fetched from Shutterfly');
    }
}