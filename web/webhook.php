<?php
require '../vendor/autoload.php';

use Mpociot\BotMan\BotManFactory;
use Mpociot\BotMan\BotMan;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('sourcebot');

if (getenv('ENVIRONMENT') == 'PRODUCTION') {
  $log->pushHandler(new StreamHandler('php://stderr', Logger::INFO));
} else {
  $dotenv = new Dotenv\Dotenv(__DIR__, '../.env');
  $dotenv->load();
  $log->pushHandler(new StreamHandler('../logs/development.log', Logger::INFO));
  foreach($_SERVER as $h=>$v)
    $log->info($h.'='.$v);
}

$log->info(file_get_contents('php://input'));

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

?>
