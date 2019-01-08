<?php

/**
 * This file contains the RWC\Shutterfly\OrderStatus class.
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright Copyright (C) 2018 Catalyst Fabric Solutions
 * @license   Private
 */

namespace RWC\Shutterfly;

/**
 * Status updates must give order status as one of the values listed in the
 * table below. Fulfillers are only required to track two states for an order:
 * ORDER_RECV and COMPLETE. The intermediate states are useful for Shutterfly
 * to track fulfillment progress for an order.
 *
 * @package RWC\Shutterfly
 */
class OrderStatuses
{
    /**
     * All Items were successfully routed to fulfillers.
     */
    const ORDER_ROUTED = 'ORDER_ROUTED';
    /**
     * Some order items were uploaded to a fulfiller
     */
    const ORDER_UPLOADED = 'ORDER_UPLOADED';

    /**
     * Order received by fulfiller. This is the initial status of the order
     */
    const ORDER_RECV = 'ORDER_RECV';

    /**
     * All images required for the order/item have been successfully fetched from Shutterfly
     */
    const IMAGES_RECV = 'IMAGES_RECV';

    /**
     * Creation of physical product has begun.
     */
    const PROCESSING = 'PROCESSING';

    /**
     * Same as READY_TO_SHIP. Can be used for partial shipments, for some items or quantities.
     */
    const READY_TO_SHIP = 'READY_TO_SHIP';

    /**
     * Order fulfillment is complete. All items with all the quantity have been completed.
     */
    const COMPLETE = 'COMPLETE';
}