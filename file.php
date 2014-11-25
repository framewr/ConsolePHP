<?php
// Создаем клас для получения содержимого файлов текстур
class File
{
      public $fileIni;
      public $fileJson;
      
      public function __construct($file_name)
      {
            $file_type_array = explode(".", $file_name);
            
            if($file_type_array[1] == 'ini') {
                  $this->fileIni = file_get_contents($file_name);
                  return $this->fileIni;                        
            } elseif ($file_type_array[1] == 'json') {
                  $this->fileJson = file_get_contents($file_name);
                  return $this->fileJson;
            } else {
                  throw new Exception('Передан файл неверного формата! Пожалуста повторите попытку снова.');
            }                        
      }
}

?>
