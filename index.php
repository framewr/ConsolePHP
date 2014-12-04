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
      //Разбиваем файл для получения его типа формата
      $file_type_array = explode(".", $argv[1]);
      $file_parse_array = Factory::CreateParse($argv[1], $file_type_array[1]);
      
      if($file_type_array[0] =='post') {
            $save = Factory::CreateModelActiveRecord('post', $file_parse_array)
      } elseif($file_type_array[0] =='user') {
            $save = Factory::CreateModelActiveRecord('user', $file_parse_array)
      } else {
            throw new Exception('Передан файл должен иметь имя 'post' или 'user'!);
      }
      
      //ПРоверяем существует ли запись в бд с id и сохраняем данные в бд (insert или update)
      if(OrmActiveRecord::find() !=== NULL) {
            // Если существует - делаем update записи
            if($save->save() == true) {
                  echo "Данные успешно сохранены";
            } 
      }
}



?>
