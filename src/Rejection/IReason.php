<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:04 PM
 */

namespace RWC\Shutterfly\Rejection;


interface IReason
{
    public function getCode() : string;
    public function getReason() : string;
}