<?php

// Подключаем Factory для работы с Parse
require_once('Factory.php');

// Создаем клас для получения содержимого файлов текстур
class File
{
      public $file_type;
      public $file_parse;
      
      public function __construct($file_name)
      {
            $file_type_array = explode(".", $file_name);
            
            if($file_type_array[1] == 'ini') {
                  $this->file_type = file_get_contents($file_name);
                  return $this->file_type;                        
            } elseif ($file_type_array[1] == 'json') {
                  $this->file_type = file_get_contents($file_name);
                  return $this->file_type;
            } else {
                  throw new Exception('Передан файл неверного формата! Пожалуста повторите попытку снова.');
            }
            
            // Парсим содержимое файла
            $obj = Factory::CreateParse();
            $this->file_parse = $obj
      }
}

?>
