<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/10/2019
 * Time: 2:29 PM
 */

namespace RWC\Shutterfly;

use RWC\Shutterfly\Status\OrderStatus;

interface IClient
{
    /**
     * Sends a status update to the Shutterfly Fulfillment API.
     *
     * @param OrderStatus $orderStatus The status update.
     * @return Response Returns an API response.
     */
    public function sendStatusRequest(OrderStatus $orderStatus) : Response;
}
