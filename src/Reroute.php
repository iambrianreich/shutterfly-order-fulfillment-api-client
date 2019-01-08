<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 1:52 PM
 */

namespace RWC\Shutterfly;


class Reroute
{
    /**
     * Text describing why items were rerouted.
     *
     * @var string
     */
    protected $reason;

    /**
     * Date items were rerouted. Stored and returned as a UNIX timestamp.
     *
     * @var int
     */
    protected $date;

    /**
     * Date that fulfiller would accept this item again. Not including this
     * element means the reroute is permanent. Stored and returned as a UNIX
     * timestamp.
     *
     * @var int|null
     */
    protected $expires;

    /**
     * List of items that were rerouted. See section 8.6.1, “ItemType Elements”
     *
     * @var Status\Item[]
     */
    protected $items;

    /**
     * Reroute constructor.
     * @param string $reason
     * @param int $date
     * @param int|null $expires
     * @param Status\Item[] $items
     */
    public function __construct(string $reason, int $date, ?int $expires, array $items)
    {
        $this->setReason($reason);
        $this->setDate($date);
        $this->setExpires($expires);
        $this->setItems($items);
    }


    /**
     * Text describing why items were rerouted
     *
     * @return string Text describing why items were rerouted
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * Text describing why items were rerouted
     *
     * @param string $reason Text describing why items were rerouted
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * Date items were rerouted
     *
     * @return int Date items were rerouted
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * Date items were rerouted
     *
     * @param int $date Date items were rerouted
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * Date that fulfiller would accept this item again. Not including this
     * element means the reroute is permanent.
     *
     * @return int|null Date that fulfiller would accept this item again.
     */
    public function getExpires(): ?int
    {
        return $this->expires;
    }

    /**
     * Date that fulfiller would accept this item again. Not including this
     * element means the reroute is permanent.
     *
     * @param int|null $expires Date that fulfiller would accept this item again.
     */
    public function setExpires(?int $expires): void
    {
        $this->expires = $expires;
    }

    /**
     * List of items that were rerouted.
     *
     * @return Status\Item[] List of items that were rerouted.
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * List of items that were rerouted. See section 8.6.1, “ItemType Elements”
     *
     * @param Status\Item[] $items List of items that were rerouted.
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }
}