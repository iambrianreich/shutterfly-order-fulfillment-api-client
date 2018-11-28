<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 4:07 PM
 */

namespace RWC\Shutterfly;


use RWC\Shutterfly\Products\IProduct;

class Item
{
    /**
     * Shutterfly assigned identifier for the item, unique within the scope of
     * the order. This identifier must be used to indicate the item in status
     * XML documents.
     *
     * @var string
     */
    protected $itemNo;

    /**
     * SKU for the item. Whether the SKU is to be provided by Shutterfly or the
     * fulfiller is determined offline.
     *
     * @var string
     */
    protected $sku;

    /**
     * Brand ID that implies additional processing for the order. What this
     * means for a specific ID is determined offline between Shutterfly and the
     * fulfiller, and may cover a number of options.
     *
     * @var string|null
     */
    protected $brand;

    /**
     * Plain text item description
     *
     * @var string|null
     */
    protected $description;

    /**
     * Quantity of this item
     *
     * @var int
     */
    protected $quantity;

    /**
     * Used to indicate a strong relationship: this item must ship together with
     * the targeted item. Example: Direct Mail envelopes that must be shipped
     * with the card.
     *
     * @var string|null
     */
    protected $belongsToItemNo;

    /**
     * Used to relate an item to another item. The content is the related
     * itemNo. It is a weak relation that recommends fulfillers to ship items
     * together, most of the times. However the fulfillers could ship the items
     * individually too, in abnormal production conditions.
     *
     * @var string|null
     */
    protected $relatedItemNo;

    /**
     * The item should be shipped by this date
     *
     * @var int|null
     */
    protected $shipByDate;

    /**
     * Number of days in transit after the item was shipped.
     *
     * @var int|null
     */
    protected $transitDays;

    /**
     * The recipient should receive this item by this date
     *
     * @var int|null
     */
    protected $receiveByDate;

    /**
     * Unit price of this item in US Dollars
     *
     * @var float
     */
    protected $unitPrice;

    /**
     * Wrapper element around product-specific data.
     *
     * @var IProduct
     */
    protected $product;
}