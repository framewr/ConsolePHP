<?php

//Подключаем ActiveRecord
require_once('activeRecord.php');

class modelOrm extends  OrmActiveRecord
{
    protected $table = '';
    protected static $tableName = '';
    public $fieldsList = array('id', 'title', ‘date’, ‘content’);
    
    public function __construct($table, $array)
    {
        self::table = '$table'; 
        $this->fieldsList = $array;
    }
}

?>
