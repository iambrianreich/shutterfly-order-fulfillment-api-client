<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 11:06 PM
 */

namespace RWC\Shutterfly;

/**
 * Copyright information. What this means and how it is used is determined
 * offline between Shutterfly and fulfillers.
 *
 * @package RWC\Shutterfly
 */
class Copyright
{
    /**
     * Code indicating which copyright logo to use. What each code means is
     * determined offline between Shutterfly and fulfillers
     *
     * @var string
     */
    protected $code;

    /**
     * Copyright message as plain text. Where to print this is determined
     * offline between Shutterfly and the fulfiller.
     *
     * @var string
     */
    protected $text;

    /**
     * Code indicating which copyright logo to use. What each code means is
     * determined offline between Shutterfly and fulfillers
     *
     * @return string Code indicating which copyright logo to use.
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Code indicating which copyright logo to use. What each code means is
     * determined offline between Shutterfly and fulfillers
     *
     * @param string $code Code indicating which copyright logo to use.
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Copyright message as plain text. Where to print this is determined
     * offline between Shutterfly and the fulfiller.
     *
     * @return string Copyright message as plain text.
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Copyright message as plain text. Where to print this is determined
     * offline between Shutterfly and the fulfiller.
     *
     * @param string $text Copyright message as plain text.
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }
}