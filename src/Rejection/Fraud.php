<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 3:24 PM
 */

namespace RWC\Shutterfly\Rejection;


class Fraud extends AbstractReason
{
    public function __construct()
    {
        $this->setCode('FRAUD');
        $this->setDescription('Fulfiller will not fulfill item because the order is believed to be fraudulent');
    }
}