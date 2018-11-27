<?php
/**
 * This file contains the RWC\Shutterfly\Processing class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */

namespace RWC\Shutterfly;

/**
 * Order-level processing instructions.
 *
 * @package RWC\Shutterfly
 */
class Processing
{
    /**
     * URL that receives status updates for this order. All status updates
     * MUST be sent to this URL. URLs given for other orders should not be
     * used for this order, and vice versa.
     *
     * @var string
     */
    protected $statusCallback;

    /**
     * Name of an internal fulfiller defined partition this order should go to.
     * For Shutterfly labs, this is the lab id.
     *
     * @var string
     */
    protected $partition;

    /**
     * Flag indicating this is a test order that should not be fulfilled.
     *
     * @var TestOrder|null
     */
    protected $testOrder;

    /**
     * Boolean flag indicating that Shutterfly certifies there are no copyright
     * issues with images in the order. Items should NOT be rejected for
     * copyright violations.
     *
     * @var bool
     */
    protected $copyrightRelease;

    /**
     * Partner ID that implies additional processing for the order. What this
     * means for a specific ID is determined offline between Shutterfly and the
     * fulfiller, and may cover a number of options.
     *
     * @var string
     */
    protected $partner;

    /**
     * URL to an image to use as a logo for this order. Where and how to apply
     * the logo is determined offline between Shutterfly and the fulfiller.
     *
     * @var string
     */
    protected $logo;

    /**
     * URL that receives status updates for this order. All status updates MUST
     * be sent to this URL. URLs given for other orders should not be used for
     * this order, and vice versa.
     *
     * @return string URL that receives status updates for this order.
     */
    public function getStatusCallback(): string
    {
        return $this->statusCallback;
    }

    /**
     * URL that receives status updates for this order. All status updates MUST
     * be sent to this URL. URLs given for other orders should not be used for
     * this order, and vice versa.
     *
     * @param string $statusCallback URL that receives status updates for this order.
     */
    public function setStatusCallback(string $statusCallback): void
    {
        $this->statusCallback = $statusCallback;
    }

    /**
     * Name of an internal fulfiller defined partition this order should go to.
     * For Shutterfly labs, this is the lab id.
     *
     * @return string Name of an internal fulfiller defined partition this order should go to.
     */
    public function getPartition(): string
    {
        return $this->partition;
    }

    /**
     * Name of an internal fulfiller defined partition this order should go to.
     * For Shutterfly labs, this is the lab id.
     *
     * @param string $partition Name of an internal fulfiller defined partition this order should go to.
     */
    public function setPartition(string $partition): void
    {
        $this->partition = $partition;
    }

    /**
     * Flag indicating this is a test order that should not be fulfilled.
     *
     * @return null|TestOrder Flag indicating this is a test order that should not be fulfilled.
     */
    public function getTestOrder(): ?TestOrder
    {
        return $this->testOrder;
    }

    /**
     * Flag indicating this is a test order that should not be fulfilled.
     *
     * @param null|TestOrder $testOrder Flag indicating this is a test order that should not be fulfilled.
     */
    public function setTestOrder(?TestOrder $testOrder): void
    {
        $this->testOrder = $testOrder;
    }

    /**
     * Returns true if this is a test order.
     *
     * @return bool Returns true if this is a test order.
     */
    public function isTestOrder() : bool
    {
        return $this->testOrder instanceof TestOrder;
    }

    /**
     * Boolean flag indicating that Shutterfly certifies there are no copyright
     * issues with images in the order. Items should NOT be rejected for
     * copyright violations.
     *s
     * @return bool Boolean flag indicating that Shutterfly certifies there are no copyright
     */
    public function isCopyrightRelease(): bool
    {
        return $this->copyrightRelease;
    }

    /**
     * Boolean flag indicating that Shutterfly certifies there are no copyright
     * issues with images in the order. Items should NOT be rejected for
     * copyright violations.
     *
     * @param bool $copyrightRelease Boolean flag indicating that Shutterfly certifies there are no copyright issues
     */
    public function setCopyrightRelease(bool $copyrightRelease): void
    {
        $this->copyrightRelease = $copyrightRelease;
    }

    /**
     * Partner ID that implies additional processing for the order. What this
     * means for a specific ID is determined offline between Shutterfly and the
     * fulfiller, and may cover a number of options.
     *
     * @return string Partner ID that implies additional processing for the order.
     */
    public function getPartner(): string
    {
        return $this->partner;
    }

    /**
     * Partner ID that implies additional processing for the order. What this
     * means for a specific ID is determined offline between Shutterfly and the
     * fulfiller, and may cover a number of options.
     *
     * @param string $partner Partner ID that implies additional processing for the order.
     */
    public function setPartner(string $partner): void
    {
        $this->partner = $partner;
    }

    /**
     * URL to an image to use as a logo for this order. Where and how to apply
     * the logo is determined offline between Shutterfly and the fulfiller.
     *
     * @return string URL to an image to use as a logo for this order.
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * URL to an image to use as a logo for this order. Where and how to apply
     * the logo is determined offline between Shutterfly and the fulfiller.
     *
     * @param string $logo URL to an image to use as a logo for this order.
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }


}