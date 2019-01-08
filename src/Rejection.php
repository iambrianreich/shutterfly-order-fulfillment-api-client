<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 1:57 PM
 */

namespace RWC\Shutterfly;


use RWC\Shutterfly\Rejection\IReason;

class Rejection
{
    /**
     * Code for the reason the item was rejected
     *
     * @var IReason
     */
    protected $reason;

    /**
     * Date items were rejected. Stored and returned as a UNIX timestamp.
     *
     * @var int
     */
    protected $date;

    /**
     * List of items that were rejected.
     *
     * @var Status\Item[]
     */
    protected $items;

    /**
     * Rejection constructor.
     * @param IReason $reason
     * @param int $date
     * @param Status\Item[] $items
     */
    public function __construct(IReason $reason, int $date, array $items)
    {
        $this->setReason($reason);
        $this->setDate($date);
        $this->setItems($items);
    }

    /**
     * Code for the reason the item was rejected.
     *
     * @return IReason Code for the reason the item was rejected.
     */
    public function getReason(): IReason
    {
        return $this->reason;
    }

    /**
     * Code for the reason the item was rejected.
     *
     * @param IReason $reason Code for the reason the item was rejected.
     */
    public function setReason(IReason $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * Date items were rejected.
     *
     * @return int Date items were rejected.
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * Date items were rejected.
     *
     * @param int $date Date items were rejected.
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * List of items that were rejected.
     *
     * @return Status\Item[] List of items that were rejected.
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * List of items that were rejected.
     *
     * @param Status\Item[] $items List of items that were rejected.
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }


}