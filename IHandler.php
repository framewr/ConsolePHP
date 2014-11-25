<?php

// Объявим интерфейс 'iHandler'
interface IHandler
{
    //Парсим файлы с расширением *.ini
    public function parseIni();
    
    //Парсим файлы с расширением *.json
    public function parseJson();
}

?>
