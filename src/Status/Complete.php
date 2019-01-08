<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:39 PM
 */

namespace RWC\Shutterfly\Status;


class Complete extends AbstractStatus
{
    public function __construct()
    {
        $this->setCode('COMPLETE');
        $this->setDescription('Order fulfillment is complete. All items with all the quantity have been completed.');
    }
}