<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/11/2019
 * Time: 1:10 PM
 */

namespace RWC\Shutterfly\Utility;

/**
 * Utility class for converting Shutterfly Fulfillment API dates and times.
 *
 * @package RWC\Shutterfly\Utility
 */
class DateConverter
{
    /**
     * Converts a Shutterfly timestamp string to a UNIX timestamp.
     *
     * @param string $shutterflyDate The Shutterfly timestamp string.
     * @return int Returns the equivalent UNIX timestamp.
     */
    public static function from(string $shutterflyDate) : int
    {
        // seems to do a great job converting in.
        return strtotime($shutterflyDate);
    }

    /**
     * Converts a UNIX timestamp to a Shutterfly datetime string.
     *
     * @param int $timestamp The UNIX timestamp.
     * @return string Returns a Fulfillment API compatible date/time string.
     */
    public static function to(int $timestamp) : string
    {
        return date('Y-m-d G:i:s e', $timestamp);
    }
}
