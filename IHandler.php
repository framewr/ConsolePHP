<?php

// Объявим интерфейс 'iHandler'
interface IHandler
{
    //Получаем и парсим содержимое передаваемого файла
    public function parseFile();
}

?>
