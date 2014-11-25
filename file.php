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
            
            // Парсим содержимое файла
            $obj = Factory::CreateParse();
            
            if($file_type_array[1] == 'ini') {
                  $this->file_type = file_get_contents($file_name);
                  // Парсим содержимое файла
                  $this->file_parse = $obj->parseIni($this->file_type)
                  return $this->file_parse;
            } elseif ($file_type_array[1] == 'json') {
                  $this->file_type = file_get_contents($file_name);
                  // Парсим содержимое файла
                  $this->file_parse = $obj->parseJson($this->file_type)
                  return $this->file_parse;
            } else {
                  throw new Exception('Передан файл неверного формата! Пожалуста повторите попытку снова.');
            }
      }
}

?>
