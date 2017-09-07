<?php

include '../model/DbConfig.php';

use WuMingHsueh\SelfAssistant\Model\DbWork\DbConfig;

try {
    $pdo = new \PDO(DbConfig::DSN, DbConfig::DB_USER , DbConfig::DB_PASSWORD);
    

    $sql = "select * from tea";
    $result = $pdo ->prepare($sql);
    $result -> execute();
    $data = $result->fetchAll(\PDO::FETCH_ASSOC);
    print_r($data);
    echo "<hr>".DbConfig::DSN;
} catch (\Exception $e)
{
    echo $e->getMessage()."<br>";
}

?>