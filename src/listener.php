<?php
require 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__, '/../.env');
$dotenv->load();

use Mpociot\BotMan\BotManFactory;
use React\EventLoop\Factory;

$loop = Factory::create();
$botman = BotManFactory::createForRTM([
    'slack_token' => getenv('SLACK_BOT_USER_OAUTH_ACCESS_TOKEN')
], $loop);

$botman->hears('ping', function($bot) {
    $bot->reply('pong at ' . time());
});

echo 'Now listening for Slack...';

$loop->run();
?>
