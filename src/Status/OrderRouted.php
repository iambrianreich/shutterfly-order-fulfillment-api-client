<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:38 PM
 */

namespace RWC\Shutterfly\Status;

class OrderRouted extends AbstractStatus
{

    public function __construct()
    {
        $this->setCode('ORDER_ROUTED');
        $this->setDescription('All order items were successfully routed to fulfillers');
    }
}