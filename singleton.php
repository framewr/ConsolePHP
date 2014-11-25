class Singleton
{
    private static $instance = null;
    private $db;
    
    private function __clone() {}
    private function __construct($db_name, $host = 'localhost', $user = 'root', $password= '') 
    {
        $this->db = new mysqli($host, $user, $password, $db_name);
    }
   
    public static function getInstance($db_name)
    {
        if (null === self::$instance) {
            self::$instance = new self($db_name);
        }
        return self::$instance;
    }
    
    public static function close_connection()
    {
        self::$mysqli->close();
    }
}
