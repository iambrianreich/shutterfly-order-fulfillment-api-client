<?php

require_once ('../vendor/autoload.php');

$status = new \RWC\Shutterfly\Status\OrderStatus(
    \RWC\Shutterfly\Version::getCurrentVersion(),
    '000090391166-7000150_56912460.124520742',
    '10000009121318683239',
    false,
    new \RWC\Shutterfly\Status\DoneProc(),
    'Completing 000090391166-7000150_56912460.124520742',
    'Using new Shutterfly Fulfillment API library to complete broken shipments.',
   null,
    new \RWC\Shutterfly\Status\Shipments([
        new \RWC\Shutterfly\Status\Shipment(
            '12345',
            strtotime('2019-01-11 08:41:26.640'),
            '1Z9353FR0130856395',
            'UPS',
            'GROUND',
            null,
            null,
            3,
            null,
            null,
            null,
            null,
            null,
            new \RWC\Shutterfly\Status\Items([
                new \RWC\Shutterfly\StatusItem(
                    '2044458669',
                    'BLANKET_FLEECE',
                    1
                )
            ])

        )
    ]),
    null,
    null,
    null
);
$http     = new \GuzzleHttp\Client(['proxy' => 'http://image_downloader:ChickenGoggles5150@40.117.196.89:4096']);
$client   = new \RWC\Shutterfly\Client($http);
$response = $client->sendStatusRequest($status);
if ($response->isError()) {
    echo 'Request failed: ' . $response->getError()->getSummary() . "\n";
    if ($response->getError()->hasDetail()) {
        echo "Details: " . $response->getError()->getDetail() . "\n";
    }
} else {
    echo 'Request succeeded: ' . $response->getSuccess() . "\n";
}
