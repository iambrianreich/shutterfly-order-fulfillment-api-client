<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/10/2019
 * Time: 2:29 PM
 */

namespace RWC\Shutterfly;

use GuzzleHttp\ClientInterface;

class Client
{
    /**
     * @var ClientInterface
     */
    protected $client;

    public function __constructor()
    {
        $this->setClient(new \GuzzleHttp\Client());
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @param ClientInterface $client
     */
    public function setClient(ClientInterface $client): void
    {
        $this->client = $client;
    }

    /**
     * Returns the API URL.
     *
     * @return string Returns the API URL.
     */
    protected function getUrl() : string
    {
        return 'http://orderfulfillment.shutterfly.com/ogateway/status/sfly/catalyst/';
    }

    public function sendStatusRequest(OrderStatus $orderStatus) : Response
    {
        // TODO How to inject correct URL?
        $httpResponse = $this->getClient()->request(
            'POST',
            $this->getUrl(),
            [
                'body' => $orderStatus->toXml(),
                'headers' => [
                    'Content-Type' => 'text/xml'
                ]
            ]
        );

        $xml = (string) $httpResponse->getBody();
        /** @var Response $response */
        $response = Response::fromXmlString($xml);
        return $response;
    }
}