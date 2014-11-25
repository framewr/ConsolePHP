#!/usr/bin/php
<?php
//Подключаем Factory
require_once('Factory.php');

//Подключаем ActiveRecord
require_once('activeRecord.php');

// Проверяем, правильно ли передано название файла
if ($argc != 2 || in_array($argv[1], array('--help', '-help', '-h', '-?'))) {
      echo "The incorrect path to the file!";
} else {
      $file_parse_array = Factory::CreateFile($argv[1]);
      
}



?>
