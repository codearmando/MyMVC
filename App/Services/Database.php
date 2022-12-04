<?php


class Database
{

    private $connection;

    public function __construct()
    {
        self::Connection();
    }

    public function Connection()
    {
        DEFINE('HOST', 'sql307.epizy.com');
        DEFINE('USER', 'epiz_33109184');
        DEFINE('PASS', 'ykryDyX6qXd');
        DEFINE('DB', 'epiz_33109184_practicag');

        $host = HOST;
        $db = DB;
        $user = USER;
        $pass = PASS;
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$db", $user, $pass, $option);

            if (!$this->connection) {
                throw new Exception('NO HAY COEXION A BD.');
            } 
            // else {
            //      echo 'conexion exitosa'.'<br>';
            // }

        } catch (\Exception $e) {
            echo 'ERROR : '. $e->getMessage(), "\n";
            //throw $th;
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getClouse()
    {
        $this->connection = null;
    }
}
