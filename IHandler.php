<?php

// Объявим интерфейс 'iHandler'
interface IHandler
{
    //Получаим и парсим содержимое передаваемого файла
    public function parseFile();
}

?>
