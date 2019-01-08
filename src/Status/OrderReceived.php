<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:39 PM
 */

namespace RWC\Shutterfly\Status;


class OrderReceived extends AbstractStatus
{
    public function __construct()
    {
        $this->setCode('ORDER_RECV');
        $this->setDescription('Order received by fulfiller. This is the initial status of the order');
    }
}