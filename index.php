<?php
ini_set( 'display_errors', 1 );
ini_set('error_reporting', E_ALL);

define('YOUR_BOT_API_TOKEN', '442718912:AAFfm5yVq225XAsWMNRi7lifOVcRmFmsDjg');
define('YOUR_BOTAN_TRACKER_API_KEY', 'fbfafc2b-2820-421f-b9d3-b4814c40bbbd');

require_once "vendor/autoload.php";
try {
    $bot = new \TelegramBot\Api\Client(YOUR_BOT_API_TOKEN, YOUR_BOTAN_TRACKER_API_KEY);

    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });

    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}