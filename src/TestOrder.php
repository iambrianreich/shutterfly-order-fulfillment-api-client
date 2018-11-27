<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 3:28 PM
 */

namespace RWC\Shutterfly;


class TestOrder
{
    /**
     * The order is processed internally but not uploaded to fulfiller.
     * Final order state: DONE_PROC.
     */
    const PROCESS_ONLY = 'PROCESS_ONLY';

    /**
     * The order should be accepted and checked for correctness. No further
     * processing should be done. Final order state: ORDER_UPLOADED or
     * ORDER_RECV.
     */
    const ACCEPT_ONLY = 'ACCEPT_ONLY';

    /**
     * The order should be printed, but not shipped. Final order state: any
     * state other than COMPLETE.
     */
    const PRINT_ONLY = 'PRINT_ONLY';

    /**
     * The order should be fully processed printed and shipped. Final order
     * state: COMPLETE. This is like a normal order only extra flagged as test
     * (not caputerd in reports).
     */
    const ORDER_COMPLETE = 'ORDER_COMPLETE';

    /**
     * The TestOrder value.
     *
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}