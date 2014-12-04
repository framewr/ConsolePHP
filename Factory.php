<?php

//Подключаем классы для factory
require_once('parse.php');
require_once('file.php');
require_once('modelOrm.php');

class Factory
{
    public static function CreateParse()
    {
        return new Parse();
    }
    
    public static function CreateModelActiveRecord($table, $array)
    {
        return new modelOrm($table, $array);
    }
}

?> 
