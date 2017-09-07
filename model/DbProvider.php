<?php
namespace WuMingHsueh\SelfAssistant\Model\DbWork;

include_once dirname(__FILE__) . '/DbConfig.php';


class DbProvider 
{
    // public function __autoload(Type $var = null)
    // {
    //     # code...
    // }
    private $pdo;
    private $pdoState;
    private $sql;

    private $insertTemplete = "insert into :table: ( :field: ) values ";
    private $updateTemplete = "update :table: set :fieldSet: ";
    private $deleteTemplete = "delete from :table: ";

    public function __construct(){
        $this -> pdo = new \PDO(DbConfig::DSN , DbConfig::DB_USER , DbConfig::DB_PASSWORD)
            or die("Unable to connect to  Database");

        $a = \func_get_args();
        $i = \func_num_args();

        if(method_exists($this , $f = '__construct'.$i) && ($i != 0))
            \call_user_func_array([$this , $f] , $a);
    }

    public function __construct3($dsn , $dbUser , $dbPassword){
        $this -> pdo = new \PDO($dsn , $dbUser , $dbPassword)
            or die("Unable to connect to  Database");
    }

    public function test(Type $var = null)
    {
        $sql = "select * from film";
        $this-> pdoState = $this -> pdo -> prepare($sql);
        $this-> pdoState -> execute();
        $data = $this-> pdoState -> fetchAll(\PDO::FETCH_ASSOC);
        
        return json_encode($data);
    }

    private function formatSqlString ($table , $field , $sqlTemplete)
    {
        // :table: relace   
        $querySql = str_ireplace(":table:" , $table , $sqlTemplete);
    }

    public function insert($table ,$field, $parmeter)
    {
        # code...
    }

    public function update(Type $var = null)
    {
        # code...
    }

    public function delete(Type $var = null)
    {
        # code...
    }

    public function select(Type $var = null)
    {
        # code...
    }
    
    public function query($sql , $parameter)
    {
        try {
            $this -> pdoState = $this -> pdo -> prepare($sql);
            $this -> pdoState -> execute($parameter);
            $data = $this -> pdoState -> fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        } catch (\PDOException $e) {
            die("Error!: " . $e->getMessage() );
        }
    }
}
?>