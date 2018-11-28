<?php
/**
 * This file contains the RWC\Shutterfly\Greeting class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */
namespace RWC\Shutterfly;

/**
 * Optional greeting to be associated with an order. Implementation is
 * determined offline between Shutterlfy and the fulfiller.
 *
 * @package RWC\Shutterfly
 */
class Greeting
{
    /**
     * First line of the greeting
     *
     * @var string
     */
    protected $line1;

    /**
     * Optional second line of the greeting
     *
     * @var string|null
     */
    protected $line2;

    /**
     * First line of the greeting
     *
     * @return string First line of the greeting
     */
    public function getLine1(): string
    {
        return $this->line1;
    }

    /**
     * First line of the greeting
     *
     * @param string $line1 First line of the greeting
     */
    public function setLine1(string $line1): void
    {
        $this->line1 = $line1;
    }

    /**
     * Optional second line of the greeting
     *
     * @return null|string Optional second line of the greeting
     */
    public function getLine2(): ?string
    {
        return $this->line2;
    }

    /**
     * Optional second line of the greeting
     *
     * @param null|string $line2 Optional second line of the greeting
     */
    public function setLine2(?string $line2): void
    {
        $this->line2 = $line2;
    }
}