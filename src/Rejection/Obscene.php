<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 3:24 PM
 */

namespace RWC\Shutterfly\Rejection;


class Obscene extends AbstractReason
{
    public function __construct()
    {
        $this->setCode('OBSCENE');
        $this->setDescription('Fulfiller will not print one or more of the images in the item because it is obscene or pornographic');
    }
}