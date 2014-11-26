<?php
require_once 'singleton.php';
class OrmActiveRecord
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
    
    public function save()
    {
        /*Если запись новая, то ей еще не присвоен id. Это означает, что мы ее «вставляем» в таблицу,
        а иначе обновляем данные
        в уже существующей записи */
        if($this->id == '') {
            $fields='';
            $values='';
            // формируем строку запроса
            // из списка полей таблицы
            $i = 1;
            foreach($this->attributes as $key=>$value) {
                $fields.=$key;     
                $values.=':'.$key;
                if($this->attributes)) {
                    $fields.=', ';
                    $values.=', ';
                }
                $i++;
            }
            $query='INSERT INTO '. $this->table .' ('.$fields.') VALUES ('.$values.')';
            self::query($query);
        } else {
            $fields='';
            $i = 1;
            foreach($this->attributes as $key=>$value) {
                if($key!='id')$fields.=$key.'=:'.$key;        
                if($i$this->attributes) && $key!='id') {
                    $fields.=', ';
                }
            $i++;
            }
            $query='UPDATE '.$this->table . ' SET '.$fields.' WHERE id=:id';
            self::query($query);
        }
    }
    
    //Выполняем запрос к бд
    public static function query($query)
    {
        //Подключаемся к бд
        self::$mysqli = Singleton::getInstance();
        //Выполняем запрос
        $result = self::$mysqli->query($query);
        if ($result == false) {
            die(self::$mysqli->error);
        }
        //Закрываем соединение с бд
        Singleton::close_connection();
        return $result;    
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
