class Singleton
{
    private static $instance = null;
    private $db;
    
    private function __clone() {}
    private function __construct($db_name = 'comments', $host = 'localhost', $user = 'root', $password= '') 
    {
        $this->db = new mysqli($host, $user, $password, $db_name);
    }
   
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public static function close_connection()
    {
        self::$mysqli->close();
    }
}
