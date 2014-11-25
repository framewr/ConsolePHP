<?php

//Подключаем файл интерфейсов
require_once('interface.php');

class Parse implements IHandler
{
    public function __construct( $id ) { }
    public function getTitle()
    {
        return "Blog Article";
    }
}

?>
