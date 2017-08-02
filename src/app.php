<?php
$dir_prefix = strpos(getcwd(), 'web') ? '../' : '';
require $dir_prefix.'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('sourcebot');

if (getenv('PRODUCTION')) {
  $log_location = 'php://stderr';
} else {
  $dotenv = new Dotenv\Dotenv(__DIR__, '../.env');
  $dotenv->load();
  $log_location = $dir_prefix.'logs/development.log';
}

$log->pushHandler(new StreamHandler($log_location, Logger::INFO));
