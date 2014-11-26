<?php

//Подключаем файл интерфейсов
require_once('IHandler.php');

//Подключаем инструмент Zend для парсинга *ini
require_once('Zend_Config_Ini.php');

class Parse implements IHandler
{
    public $file_parse;
    public $fileGetContent;
    
    public function parseFile($parse_string, $format_file)
    {
        //Получаем содержимое передаваемого файла
        $this->fileGetContent = file_get_contents($parse_string);
        
        //Парсим содержимое файла в зависимости от формата *.ini или *.json
        if($format_file == 'ini') {
            $this->file_parse = new Zend_Config_Ini($this->fileGetContent, 'staging');
            return $this->file_parse;
        } elseif ($format_file == 'json') {
            $this->file_parse = json_decode($this->fileGetContent);
            return $this->file_parse;
        } else {
            throw new Exception('Передан файл неверного формата! Пожалуйста повторите попытку снова.');
        }
    }
}

?>
