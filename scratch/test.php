<?php

require_once ('../vendor/autoload.php');

$response = \RWC\Shutterfly\Response::fromXmlString('
    <response xmlns="http://www.shutterfly.com/orderv3/response">
        <version>3.0</version>
        <success>
            <message>yay</message>
        </success>
    </response>
');

var_dump($response);
var_dump($response->toXml());