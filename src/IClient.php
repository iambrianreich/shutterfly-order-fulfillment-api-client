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

    /**
     * Returns a clone of this Client with a new API URL.
     *
     * @param string $apiUrl The API URL.
     * @return Client Returns a clone of this client with the specified API URL.
     */
    public function withUrl(string $apiUrl) : Client;
}
