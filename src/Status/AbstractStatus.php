<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:35 PM
 */

namespace RWC\Shutterfly\Status;


class AbstractStatus implements IStatus
{
    /**
     * Shutterfly status code.
     *
     * @var string
     */
    protected $code;

    /**
     * Shutterfly status description.
     *
     * @var string
     */
    protected $description;

    /**
     * Shutterfly status code.
     *
     * @return string Returns the Shutterfly status code.
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Sets the Shutterfly status code.
     *
     * @param string $code The Shutterfly status code.
     */
    protected function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Returns a description of the status.
     *
     * @return string Returns a description of the status.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets a description of the status.
     *
     * @param string $description Sets a description of the status.
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}