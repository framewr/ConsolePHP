<?php
require_once 'singleton.php';
class OrmActiveRecord_User
{
    public static $mysqli;
    //название таблицы для выполнения запроса
    protected $table = '';
    protected static $tableName = '';
    
    //массив с полями таблицы и их значениями
    public $attributes = array();
    
    //список полей таблицы
    public $fieldsList = array();
    
    public function __set($name, $value)
    {
        //Если название поля таблицы есть в списке, то записываем полученные данные
        foreach($this->fieldsList as $field) {
            if($field == $name) {
                $this->attributes[$name] = $value;
            }
        }
    }
    
    public function __get($name)
    {
        //Возвращаем значение при условии его существования
        if(isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }
    }
    
    // Сохраняем данные в бд
    public function save()
    {
        self::$mysqli = Singleton::getInstance();
        $result = self::$mysqli->query($this->insert());
        if ($result == false) {
            die(self::$mysqli->error);
        }
        Singleton::close_connection();
        return $result;
    }
    
    public function insert()
    {
        $fields='';
        $values='';
    
        // формируем строку запроса
        $i = 1;
        foreach($this->attributes as $key=>$value) {
            $fields.=$key;     
            $values.=':'.$key;
            if($i$this->attributes)) {
                $fields.=', ';
                $values.=', ';
            }
            $i++;
        }
        $query='INSERT INTO '.$this->table .' ('.$fields.') VALUES ('.$values.')';
    }
    
    //Делаем выборку данных с бд
    public static function find($id)
    {
        $this->mysqli = Singleton::getInstance();
        $table = self::$tableName;
        $sql = "SELECT * FROM " . $table . "WHERE 'id' = " . $id;
        $result = self::$mysqli->query($sql);
        
        if ($result == false) {
            die(self::$mysqli->error);
        }
        Singleton::close_connection();
        $result_comments = array();
      
        while($obj = $result->fetch()) { 
            $result_comments[]=$obj;
        }
        return $result_comments;
    }
}
?>
