#!/usr/bin/php
<?php
//Подключаем Factory
require_once('Factory.php');

//Подключаем ActiveRecord
require_once('activeRecord.php');

// Проверяем, правильно ли передано название файла
if ($argc != 2 || !is_array($argv[1])) {
      echo "The incorrect path to the file!";
} else {
      $file_parse_array = Factory::CreateFile($argv[1]);
      //ПРоверяем существует ли запись в бд с id и сохраняем данные в бд (insert или update)
      if(OrmActiveRecord::find($file_parse_array->id) !=== NULL) {
            // Если существует - делаем update записи
            if(OrmActiveRecord::save($file_parse_array) == true) {
                  echo "Данные успешно сохранены";
            } 
      }
}



?>
