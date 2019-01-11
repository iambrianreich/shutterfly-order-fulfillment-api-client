<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:39 PM
 */

namespace RWC\Shutterfly\Status;

class Processing extends AbstractStatus
{
    public function __construct()
    {
        $this->setCode('PROCESSING');
        $this->setDescription('Creation of physical product has begun.');
    }
}