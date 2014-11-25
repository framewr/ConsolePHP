<?php

//Подключаем файл интерфейсов
require_once('IHandler.php');

//Подключаем инструмент Zend для парсинга *ini
require_once('Zend_Config_Ini.php');

class Parse implements IHandler
{
    public $parse_string;
    
    public function parseIni($fileIni)
    {
        $this->parse_string = new Zend_Config_Ini($parseIni, 'staging');
        return $this->parse_string;
    }
    
    public function parseJson($fileJson)
    {
        $this->parse_string = json_decode($fileJson);
        return $this->parse_string;
    }
}

?>
