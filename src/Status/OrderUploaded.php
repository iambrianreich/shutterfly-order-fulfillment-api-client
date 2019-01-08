<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:39 PM
 */

namespace RWC\Shutterfly\Status;


class OrderUploaded extends AbstractStatus
{
    public function __construct()
    {
        $this->setCode('ORDER_UPLOADED');
        $this->setDescription('Some order items were uploaded to a fulfiller');
    }
}