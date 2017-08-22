<?php
ini_set( 'display_errors', 1 );
ini_set('error_reporting', E_ALL);

define('BOT_TOKEN', '442718912:AAFfm5yVq225XAsWMNRi7lifOVcRmFmsDjg');
define('BOTAN_TRACKER_API_KEY', 'fbfafc2b-2820-421f-b9d3-b4814c40bbbd');

require_once "vendor/autoload.php";

use Telegram\Bot\Api;

$telegram = new Api('BOT_TOKEN');

$response = $telegram->getMe();

$botId = $response->getId();
$firstName = $response->getFirstName();
$username = $response->getUsername();

