<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 1:26 PM
 */

namespace RWC\Shutterfly\Status;


interface IStatus
{
    /**
     * Shutterfly status code.
     *
     * @return string Returns the Shutterfly status code.
     */
    public function getCode(): string;

    /**
     * Returns a description of the status.
     *
     * @return string Returns a description of the status.
     */
    public function getDescription() : string;
}