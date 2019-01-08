<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:39 PM
 */

namespace RWC\Shutterfly\Status;


class ReadyToShip extends AbstractStatus
{
    public function __construct()
    {
        $this->setCode('READY_TO_SHIP');
        $this->setDescription('Creation of physical product has completed. All items are waiting to ship.');
    }
}