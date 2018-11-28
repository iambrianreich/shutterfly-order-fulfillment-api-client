<?php
/**
 * This file contains the RWC\Shutterfly\DeliveryEstimate class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */
namespace RWC\Shutterfly;

/**
 * Describes order delivery expectations.
 *
 * @package RWC\Shutterfly
 */
class DeliveryEstimate
{
    /**
     * The earliest date the recipient should expect to receive shipments.
     *
     * @var int
     */
    protected $earliest;

    /**
     * The latest date the recipient should expect to receive shipments.
     *
     * @var int|null
     */
    protected $latest;

    /**
     * Boolean flag indicating shipping cutoff rules for one or more items in
     * the suborder (order by date ‘X’ and it will be delivered by date ‘Y’)
     * were used to generate this estimate
     *
     * @var bool|null
     */
    protected $includesCutoff;

    /**
     * The earliest date the recipient should expect to receive shipments.
     *
     * @return int The earliest date the recipient should expect to receive shipments.
     */
    public function getEarliest(): int
    {
        return $this->earliest;
    }

    /**
     * The earliest date the recipient should expect to receive shipments.
     *
     * @param int $earliest The earliest date the recipient should expect to receive shipments.
     */
    public function setEarliest(int $earliest): void
    {
        $this->earliest = $earliest;
    }

    /**
     * The latest date the recipient should expect to receive shipments.
     *
     * @return int|null The latest date the recipient should expect to receive shipments.
     */
    public function getLatest(): ?int
    {
        return $this->latest;
    }

    /**
     * The latest date the recipient should expect to receive shipments.
     *
     * @param int|null $latest The latest date the recipient should expect to receive shipments.
     */
    public function setLatest(?int $latest): void
    {
        $this->latest = $latest;
    }

    /**
     * Boolean flag indicating shipping cutoff rules for one or more items in
     * the suborder (order by date ‘X’ and it will be delivered by date ‘Y’)
     * were used to generate this estimate
     *
     * @return bool|null Boolean flag indicating shipping cutoff rules for one or more items in the suborder
     */
    public function getIncludesCutoff(): ?bool
    {
        return $this->includesCutoff;
    }

    /**
     * Boolean flag indicating shipping cutoff rules for one or more items in
     * the suborder (order by date ‘X’ and it will be delivered by date ‘Y’)
     * were used to generate this estimate
     *
     * @param bool|null $includesCutoff Boolean flag indicating shipping cutoff rules for one or more items in the suborders
     */
    public function setIncludesCutoff(?bool $includesCutoff): void
    {
        $this->includesCutoff = $includesCutoff;
    }
}
