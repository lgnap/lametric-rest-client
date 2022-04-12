<?php

use LGnap\OpenAPIClient\Model\DeviceUpdate;
use LGnap\OpenAPIClient\Model\ScreenUpdate;
use LGnap\OpenAPIClient\Model\UserUpdate;
use LGnap\Wrapper\ClientWrapper;

require_once 'vendor/autoload.php';

// These calls needs a http client that must be provided through discovery
// not included into this package (in prod mode, in dev there are one) !

//dev token, not used in prod ^^
$client = ClientWrapper::createDevClient('wo7o8KTuSW5bEtR1UHqA7oMkpTvvnvxS');

var_dump($client->listUsers());
var_dump($client->listScreensAsFrames(['device_id' => 19]));
var_dump($client->listScreens(['device_id' => 19]));
var_dump($client->listMyDevices());
var_dump($client->listDevices());

$user = $client->createUser(
    (new UserUpdate())
    ->setUsername('username')
    ->setAccessToken('accessToken')
    ->setAuthKey('authKey')
);

$device = $client->createDevice(
    (new DeviceUpdate())
    ->setName('device' . time())
    ->setUserId($user->getId())
);

$screen = $client->createScreen(
    (new ScreenUpdate())
    ->setIcon(1)
    ->setText('text ' . time()),
    ['device_id' => $device->getId()]
);

var_dump($client->updateDevice($device->getId(), (new DeviceUpdate())->setUserId(1)->setName('changedName')));
var_dump($client->updateScreen($screen->getId(), (new ScreenUpdate())->setText('textChanged')->setIcon(88), ['device_id'=> $device->getId()]));
var_dump($client->updateUser($user->getId(), (new UserUpdate())->setUsername('changedUsername')->setAuthKey('authKe')));

var_dump($client->deleteDevice($device->getId()));
var_dump($client->deleteScreen($screen->getId(), ['device_id'=> $device->getId()]));
var_dump($client->deleteUser($user->getId()));
