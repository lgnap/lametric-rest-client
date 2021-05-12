<?php

use LGnap\Wrapper\ClientWrapper;

require_once 'vendor/autoload.php';

// These calls needs a http client that must be provided through discovery
// not included into this package !

$client = ClientWrapper::createProdClient('xxx');
var_dump($client->listMyDevices());

$client = ClientWrapper::createDevClient('yyy');
var_dump($client->listMyDevices());

