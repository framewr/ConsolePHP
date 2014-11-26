<?php

// Подключаем Factory для работы с Parse
require_once('Factory.php');

// Создаем клас для получения содержимого файлов текстур
class File
{
      public $file_type;
      public $file_parse;
      
      public function __construct($file_name, $file_type)
      {
            // Парсим содержимое файла
            $obj = Factory::CreateParse();
            $this->file_parse = $obj->parseFile($file_name, $file_type)
            return $this->file_parse;
      }
}

?>
