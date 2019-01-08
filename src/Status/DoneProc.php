<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:39 PM
 */

namespace RWC\Shutterfly\Status;


class DoneProc extends AbstractStatus
{
    public function __construct()
    {
        $this->setCode('DONE_PROC');
        $this->setDescription('Same as READY_TO_SHIP. Can be used for partial shipments, for some items or quantities.');
    }
}