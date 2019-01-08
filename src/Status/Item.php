<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 1:34 PM
 */

namespace RWC\Shutterfly\Status;

/**
 * An item associated with a status update.
 *
 * @package RWC\Shutterfly\Status
 */
class Item
{
    /**
     * Shutterfly specified item identifier. Same as itemNo in Order XML.
     *
     * @var string
     */
    protected $itemNo;

    /**
     * Fulfiller specific SKU
     *
     * @var string
     */
    protected $sku;

    /**
     * Quantity of the item that was shipped.
     *
     * @var int
     */
    protected $quantity;

    /**
     * Extra status notes
     *
     * @var string Extra status notes
     */
    protected $notes;

    /**
     * Item constructor.
     * @param string $itemNo
     * @param string $sku
     * @param int $quantity
     * @param string $notes
     */
    public function __construct(string $itemNo, string $sku, int $quantity, ?string $notes = null)
    {
        $this->setItemNo($itemNo);
        $this->setSku($sku);
        $this->setQuantity($quantity);
        $this->setNotes($notes);
    }


    /**
     * Shutterfly specified item identifier. Same as itemNo in Order XML.
     *
     * @return string Shutterfly specified item identifier. Same as itemNo in Order XML.
     */
    public function getItemNo(): string
    {
        return $this->itemNo;
    }

    /**
     * Shutterfly specified item identifier. Same as itemNo in Order XML.
     *
     * @param string $itemNo Shutterfly specified item identifier. Same as itemNo in Order XML.
     */
    public function setItemNo(string $itemNo): void
    {
        $this->itemNo = $itemNo;
    }

    /**
     * Fulfiller specific SKU
     *
     * @return string Fulfiller specific SKU
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * Fulfiller specific SKU
     *
     * @param string $sku Fulfiller specific SKU
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * Quantity of the item that was shipped.
     *
     * @return int Quantity of the item that was shipped.
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Quantity of the item that was shipped.
     *
     * @param int $quantity Quantity of the item that was shipped.
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Extra status notes
     *
     * @return string Extra status notes
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * Extra status notes
     *
     * @param string $notes Extra status notes
     */
    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }
}