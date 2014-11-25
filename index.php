#!/usr/bin/php
<?php
//Подключаем Factory
require_once('Factory.php');

// Проверяем, правильно ли передано название файла
if ($argc != 2 || in_array($argv[1], array('--help', '-help', '-h', '-?'))) {
      echo "The incorrect path to the file!";
} else {
      $file = Factory::CreateFile($argv[1]);
      
}



?>
