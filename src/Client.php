<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/10/2019
 * Time: 2:29 PM
 */

namespace RWC\Shutterfly;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use RWC\Shutterfly\Status\OrderStatus;

class Client implements IClient
{
    /**
     * The URL of the production API.
     *
     * @var string
     */
    const PRODUCTION_URL = 'http://orderfulfillment.shutterfly.com/ogateway/status/sfly/catalyst/';

    /**
     * The API URL. Will default to the production URL. Can overload with
     * setUrl() in order to process sandbox orders.
     *
     * @var string
     */
    protected $apiUrl;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @param ClientInterface|null $client The Guzzle Client.
     * @param string $apiUrl The Shutterfly Fulfillment API URL.
     */
    public function __construct(?ClientInterface $client = null, string $apiUrl = self::PRODUCTION_URL)
    {
        $client = $client ?? new \GuzzleHttp\Client();
        $this->setClient($client);
        $this->setUrl($apiUrl);
    }

    /**
     * @return ClientInterface
     */
    public function getClient() : ClientInterface
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
    public function getUrl() : string
    {
        return $this->apiUrl;
    }

    /**
     * Sets the Shutterfly Fulfillment API URL.
     *
     * @param string $apiUrl the Shutterfly Fulfillment API URL.
     */
    public function setUrl(string $apiUrl) : void
    {
        $this->apiUrl = $apiUrl;
    }

    public function sendStatusRequest(OrderStatus $orderStatus) : Response
    {
        try {
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

        } catch (ClientException $clientError) {
           if ($clientError->hasResponse()) {
               $xml = (string) $clientError->getResponse()->getBody();

               /** @var Response $response */
               $response = Response::fromXmlString($xml);
               return $response;
           }
        }
    }

    /**
     * Returns a clone of this Client with a new API URL.
     *
     * @param string $apiUrl The API URL.
     * @return Client Returns a clone of this client with the specified API URL.
     */
    public function withUrl(string $apiUrl) : Client
    {
        return new self(
            $this->getClient(),
            $apiUrl
        );
    }
}