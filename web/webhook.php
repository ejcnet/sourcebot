<?php
require '../src/app.php';

use Mpociot\BotMan\BotManFactory;
use Mpociot\BotMan\BotMan;

if (getenv('FACEBOOK_APP_SECRET')) {
    $config = [
    'facebook_token' => getenv('FACEBOOK_PAGE_ACCESS_TOKEN'),
    'facebook_app_secret' => getenv('FACEBOOK_APP_SECRET')
  ];

    $botman = BotManFactory::create($config);

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['hub_mode'])) {
        $botman->verifyServices(getenv('FACEBOOK_VERIFY_TOKEN'));
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $botman->hears('ping', function ($bot) {
            $bot->reply('pong at ' . time());
        });

        $botman->fallback(function ($bot) {
            $bot->reply('Try "ping"...');
        });

        $botman->listen();
    }
} else {
    $error = 'Please set FACEBOOK_APP_SECRET.';
    $log->info($error);
    echo '<p>'.$error.'</p>';
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_GET['hub_mode'])) {
    $error = 'This webhook handles Facebook Webhook verification via GET or a Facebook Webhook via POST.';
    $log->info($error);
    echo '<p>'.$error.'</p>';
}
