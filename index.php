#!/usr/bin/php
<?php
//Подключаем Factory
require_once('Factory.php');

//Подключаем ActiveRecord 2 модели (User и Post)
require_once('activeRecord_Post.php');
require_once('activeRecord_User.php');

// Проверяем, правильно ли передано название файла
if ($argc != 2 || !is_array($argv[1])) {
      echo "The incorrect path to the file!";
} else {
      $file_parse_array = Factory::CreateFile($argv[1]);
      
      //ПРоверяем существует ли запись в бд с id
      if(isset(OrmActiveRecord_User::find($file_parse_array->id))) {
            // Если существует - делаем update записи
            if(OrmActiveRecord_User::save($file_parse_array)) {
                  echo "Данные успешно обновлены";
            }
      }
      
      
}



?>
