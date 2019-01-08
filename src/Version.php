<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:13 PM
 */

namespace RWC\Shutterfly;


class Version
{
    const VERSION = '3.0';

    /**
     * @return string Returns the current API version.
     */
    public final function getVersion()
    {
        return self::VERSION;
    }
}