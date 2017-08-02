<?php
require '../src/app.php';

use Mpociot\BotMan\BotManFactory;
use Mpociot\BotMan\BotMan;

$log->info('Request body: '.file_get_contents('php://input'));

$config = [
  'facebook_token' => getenv('FACEBOOK_PAGE_ACCESS_TOKEN'),
  'facebook_app_secret' => getenv('FACEBOOK_APP_SECRET')
];

$botman = BotManFactory::create($config);

$botman->verifyServices(getenv('FACEBOOK_VERIFY_TOKEN'));

$botman->hears('ping', function($bot) {
  $bot->reply('pong at ' . time());
});

$botman->fallback(function($bot) {
  $bot->reply('Try "ping"...');
});

$botman->listen();
