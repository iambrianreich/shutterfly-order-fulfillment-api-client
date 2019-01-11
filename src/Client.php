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
use GuzzleHttp\Exception\GuzzleException;
use RWC\Shutterfly\Status\OrderStatus;

class Client
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @param ClientInterface|null $client
     */
    public function __construct(?ClientInterface $client = null)
    {
        $client = $client ?? new \GuzzleHttp\Client();
        $this->setClient($client);
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
    protected function getUrl() : string
    {
        return 'http://orderfulfillment.shutterfly.com/ogateway/status/sfly/catalyst/';
    }

    public function sendStatusRequest(OrderStatus $orderStatus) : Response
    {
        // TODO How to inject correct URL?
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
}