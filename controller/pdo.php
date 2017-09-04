<?php

include '../model/dbconfig.php';

try {
    $pdo = new \PDO(DSN, DB_USER , DB_PASSWORD);
    

    $sql = "select * from tea";
    $result = $pdo ->prepare($sql);
    $result -> execute();
    $data = $result->fetchAll(\PDO::FETCH_ASSOC);
    print_r($data);
} catch (\Exception $e)
{
    echo $e->getMessage()."<br>";
}

?>