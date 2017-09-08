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

    private $insertTemplete = 'insert into ":table:" ( :field: ) values ';
    private $updateTemplete = 'update ":table:" set :fieldSet: ';
    private $deleteTemplete = 'delete from ":table:" ';

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

    public function test()
    {
        // $sql = "select * from tea";
        // $this-> pdoState = $this -> pdo -> prepare($sql);
        // $this-> pdoState -> execute();
        // $data = $this-> pdoState -> fetchAll(\PDO::FETCH_ASSOC);
        // return json_encode($data);
        
        $parameter[] = ['Name' => 'kobe' , 'Price' => 400 , 'NowTime' => date('Y-m-d H:i:s')];
        $parameter[] = ['Name' => 'iverson' , 'Price' => 90000 , 'NowTime' => date('Y-m-d H:i:s')];
        $parameter[] = ['Name' => 'rick' , 'Price' => 3250 , 'NowTime' => date('Y-m-d H:i:s')];
        $this -> insert( "NameInsert" , ['Name' , 'Price' , 'NowTime'] , $parameter);
        
    }

    private function prepareSqlTable ($table , $sqlTemplete)
    {
        // :table: relace  and initial sql 
        $this -> sql = str_ireplace(":table:" , $table , $sqlTemplete);
    }

    private function prepareSqlWhere( $fields , $parameter)
    {
        $tempArray = [];
        foreach ($fields as $key => $field) 
            $tempArray[] = $field . " = " . $parameter[$key];
        $this -> sql = $this -> sql ." where ". \implode(' and ' , $tempArray);
    }

    private function prepareSqlInsert( $table , $fields , $parameter)
    {
        $this -> prepareSqlTable($table , $this->insertTemplete);
        
        $tempSql = str_ireplace(":field:",  '"'. \implode('" , "' , $fields) .'"' ,$this -> sql );

        if (count( array_filter( $parameter , "is_array" ) ) != 0)
        {
            $insertSqlValue = [];
            foreach ($parameter as $rowData) 
                $insertSqlValue[] = '( '.implode(' , ',array_fill(0 , count($rowData) , '?')) . ' )';
            $tempSql .= \implode(' , ' , $insertSqlValue);
        } else {
            $tempSql .= '( '.implode(' , ',array_fill(0 , count($parameter) , '?')) . ' )';
        }

        $this-> sql = $tempSql;
    }

    public function insert($table ,$field, $parameter)
    {
        $this->prepareSqlInsert($table ,$field, $parameter);

        $insertparameter = [];
        if (count( array_filter( $parameter , "is_array" ) ) != 0) {
            foreach ($parameter as $rowData) 
                $insertparameter =  array_merge( $insertparameter , array_values($rowData) );
        } else 
            $insertparameter = array_values($parameter);
        
        $this -> pdo -> beginTransaction();
        $status = $this -> tranctions($this->sql , $insertparameter);
        $this -> pdo -> commit();
        return $status;
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

    public function tranctions($sql , $parameter)
    {
        try {
            $this -> pdoState = $this -> pdo -> prepare($sql);
            return ( $this -> pdoState -> execute($parameter) ) ? true : false;
        } catch (\PDOException $e) {
            die("Error!: " . $e -> getMessage() );
        }
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