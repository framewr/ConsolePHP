<?php

//Подключаем ActiveRecord
require_once('activeRecord.php');

class modelOrm extends  OrmActiveRecord
{
    protected $table = '';
    protected static $tableName = '';
    public $fieldsList = array();
    
    public function __construct($table, $array)
    {
        self::table = '$table'; 
        $this->fieldsList = $array;
    }
}

?>
