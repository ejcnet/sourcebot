<?php
$dir_prefix = strpos(getcwd(), 'web') ? '../' : '';
require $dir_prefix.'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('sourcebot');

if (getenv('APP_ENVIRONMENT') && getenv('APP_ENVIRONMENT') !== 'development') {
  $log_location = 'php://stdout';
} else {
  $dotenv = new Dotenv\Dotenv(__DIR__, '../.env');
  $dotenv->load();
  $log_location = $dir_prefix.'logs/development.log';
}

$log->pushHandler(new StreamHandler($log_location, Logger::INFO));
$log->info('Logging to '.$log_location);

if (isset($_SERVER['REQUEST_METHOD']) && isset($_SERVER['REQUEST_URI'])) {
  $log->info($_SERVER['REQUEST_METHOD'].'=>'.$_SERVER['REQUEST_URI']);
}

if (file_get_contents('php://input')) {
  $log->info('Body=>'.file_get_contents('php://input'));
}
