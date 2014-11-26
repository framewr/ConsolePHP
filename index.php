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
      if(OrmActiveRecord_User::find($file_parse_array->id) !=== NULL) {
            // Если существует - делаем update записи
            if(OrmActiveRecord_User::save($file_parse_array) == true) {
                  echo "Данные успешно обновлены";
            } 
      } else {
            // Иначе добавляем новую запись в таблицу бд
            if(OrmActiveRecord_User::insert($file_parse_array) == true) {
                  echo "Данные успешно добавлены в бд";      
            }
      }
}



?>
