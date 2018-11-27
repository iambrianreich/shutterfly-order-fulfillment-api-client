<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 4:00 PM
 */

namespace RWC\Shutterfly;


class Priority
{
    /**
     * Default delivery priority.
     */
    const NORMAL = 'normal';

    /**
     * Expedited delivery priority.
     */
    const SUPER_RUSH = 'super_rush';

    /**
     * Next-day delivery priority.
     */
    const NEXT_DAY = 'next_day';

    /**
     * The priority value.
     *
     * @var string
     */
    protected $value;

    /**
     * Sets the priority level.
     *
     * @param string $value Sets the priority level.
     */
    public function setValue(string $value) : void
    {
        $this->value = $value;
    }

    /**
     * Returns the priority level.
     *
     * @return string Returns the priority level.
     */
    public function getValue() : string
    {
        return $this->value;
    }
}