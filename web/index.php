<?php
require '../src/app.php';
use Michelf\Markdown;
$html=Markdown::defaultTransform(file_get_contents('../README.md'));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sourcebot</title>
  </head>
  <body>
    <?=$html?>
  </body>
</html>
