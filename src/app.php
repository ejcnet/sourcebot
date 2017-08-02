<?php
$dir_prefix = strpos(getcwd(), 'web') ? '../' : '';
require $dir_prefix.'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('sourcebot');

if (file_exists($dir_prefix.'logs/')) {
  $log_location = $dir_prefix.'logs/development.log';
} else {
  $log_location = 'php://stdout';
}

if (file_exists('../.env')) {
  $dotenv = new Dotenv\Dotenv(__DIR__, '../.env');
  $dotenv->load();
}

$log->pushHandler(new StreamHandler($log_location, Logger::INFO));
$log->info('Logging to '.$log_location);

if (isset($_SERVER['REQUEST_METHOD']) && isset($_SERVER['REQUEST_URI'])) {
  $log->info($_SERVER['REQUEST_METHOD'].'=>'.$_SERVER['REQUEST_URI']);
}

if (file_get_contents('php://input')) {
  $log->info('Body=>'.file_get_contents('php://input'));
}
