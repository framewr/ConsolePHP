<?php

//Подключаем файл интерфейсов
require_once('interface.php');

//Подключаем инструмент Zend для парсинга *ini
require_once('Zend_Config_Ini.php');

class Parse implements IHandler
{
    public $parseJson;
    public $parseIni;
    
    public function parseIni($fileIni)
    {
        $this->parseIni = new Zend_Config_Ini($parseIni, 'staging');
        return $this->parseIni;
    }
    
    public function parseJson($fileJson)
    {
        $this->parseJson = json_decode($fileJson);
        return $this->parseJson;
    }
}

?>
