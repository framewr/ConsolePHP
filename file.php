<?php
// Создаем клас для получения содержимого файлов текстур
class File
{
      public $file;
      public function __construct($file_path)
      {
            $this->file = file_get_contents($file_path);
            return $this->file;
      }
}

?>
