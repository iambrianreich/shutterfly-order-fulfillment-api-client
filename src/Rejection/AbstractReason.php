<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 3:21 PM
 */

namespace RWC\Shutterfly\Rejection;


abstract class AbstractReason implements IReason
{
    /**
     * The Shutterfly rejection code.
     *
     * @var string
     */
    protected $code;

    /**
     * A description of the rejection reason.
     *
     * @var string
     */
    protected $description;

    /**
     * Returns the Shutterfly rejection code.
     *
     * @return string Returns the Shutterfly rejection code.
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Sets the Shutterfly rejection code.
     *
     * @param string $code The Shutterfly rejection code.
     */
    protected function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Returns a description of the rejection reason.
     *
     * @return string Returns a description of the rejection reason.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets a description of the rejection reason.
     *
     * @param string $description Sets a description of the rejection reason.
     */
    protected function setDescription(string $description): void
    {
        $this->description = $description;
    }
}