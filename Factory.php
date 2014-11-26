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
    
    public static function CreateFile($file_name)
    {
        return new File($file_name);
    }
    
    public static function CreateModelActiveRecord()
    {
        return new modelOrm();
    }
}


?> 
