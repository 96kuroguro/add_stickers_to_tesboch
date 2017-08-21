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



$bot->editedMessage(function ($message) use ($bot) {
        //テキストを編集（EDIT）したときに動く
        $bot->sendMessage($message->getChat()->getId(), 'editedMessage');
});

$bot->callbackQuery(function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'callbackQuery');
});

$bot->channelPost(function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'channelPost');
});

$bot->editedChannelPost(function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'editedChannelPost');
});

$bot->inlineQuery(function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'inlineQuery');
});

$bot->chosenInlineResult(function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'chosenInlineResult');
});
$bot->shippingQuery(function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'shippingQuery');
});
$bot->preCheckoutQuery(function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'preCheckoutQuery');
});

$bot->on(
        function ($update) use ($bot) {
                $message = $update->getMessage();
                if (!$message) {
                        return true;
                }

                $action = new ReflectionFunction(function ($message) use ($bot) {
                        $bot->sendMessage($message->getChat()->getId(), 'on');
                });

                $action->invokeArgs($message);

                return false;
        };
);

    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}