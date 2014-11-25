<?php

//Подключаем 
require_once('parse.php');

class parseFactory
{
    public static function Create()
    {
        return new Parse();
    }
}

$ao = parseFactory::Create();
echo( $ao->getTitle()."\n" );

?>
