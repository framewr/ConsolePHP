<?php

//Подключаем ActiveRecord
require_once('activeRecord.php');

class modelOrm extends  OrmActiveRecord
{
    protected $table = 'news';
    protected static $tableName = 'news';
    public $fieldsList = array('id', 'title', ‘date’, ‘content’);


}

?>
