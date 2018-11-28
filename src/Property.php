<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 10:38 PM
 */

namespace RWC\Shutterfly;


class Property
{
    /**
     * Property name. Format: uppercase letters, numbers and undescores.
     *
     * @var string
     */
    protected $name;

    /**
     * Property value. Format: uppercase letters, numbers and undescores.
     *
     * @var string
     */
    protected $value;

    /**
     * Property sequence number, for properties with the same name when the
     * sequence is relevant.
     *
     * @var int|null
     */
    protected $sequenceNumber;

    /**
     * Property name. Format: uppercase letters, numbers and undescores.
     *
     * @return string Property name. Format: uppercase letters, numbers and undescores.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Property name. Format: uppercase letters, numbers and undescores.
     *
     * @param string $name Property name. Format: uppercase letters, numbers and undescores.
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Property value. Format: uppercase letters, numbers and undescores.
     *
     * @return string Property value. Format: uppercase letters, numbers and undescores.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Property value. Format: uppercase letters, numbers and undescores.
     *
     * @param string $value Property value. Format: uppercase letters, numbers and undescores.
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * Property sequence number, for properties with the same name when the
     * sequence is relevant.
     *
     * @return int|null Property sequence number
     */
    public function getSequenceNumber(): ?int
    {
        return $this->sequenceNumber;
    }

    /**
     * Property sequence number, for properties with the same name when the
     * sequence is relevant.
     *
     * @param int|null $sequenceNumber Property sequence number
     */
    public function setSequenceNumber(?int $sequenceNumber): void
    {
        $this->sequenceNumber = $sequenceNumber;
    }
}