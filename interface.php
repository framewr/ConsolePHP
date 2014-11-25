<?php
// Объявим интерфейс 'iHandler'
interface iHandler
{
    public function setVariable($name, $var);
    public function getHtml($template);
}


?>
