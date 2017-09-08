<?php

include dirname(dirname(__FILE__)) . "/model/DbProvider.php";
use \WuMingHsueh\SelfAssistant\Model\DbWork\DbProvider;

// $userModel = new DbProvider('pgsql:host=127.0.0.1;dbname=teashop' , 'ri3567' , 'IISuess1120');
// echo $userModel -> test();

$dsn = 'sqlsrv:Server=10.10.51.107,1433;Database=NORTHWND';
$dsn = 'dblib:host=10.10.51.107:1433;dbname=NORTHWND';
$sql = "select * from Territories";

try {
    $dbProviderTest = new \PDO($dsn , 'ri3567' , 'IISuess1120');
    $dbProviderTest ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    $pdoState = $dbProviderTest -> prepare($sql);
    $pdoState -> execute();
    $data = $pdoState -> fetchAll(\PDO::FETCH_ASSOC);
    print_r($data);

    
} catch (\PDOException $e) {
    echo $e->getMessage();
}
// echo $dbProviderTest->query($sql , []);





?>