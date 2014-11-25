<?php
// Объявим интерфейс 'iHandler'
interface iHandler
{
    //Парсим файлы с расширением *.ini
    public function parseIni();
    
    //Парсим файлы с расширением *.json
    public function parseJson();
}
?>
