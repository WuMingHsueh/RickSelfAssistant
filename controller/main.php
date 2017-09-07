<?php

include dirname(dirname(__FILE__)) . "/model/DbProvider.php";
use \WuMingHsueh\SelfAssistant\Model\DbWork\DbProvider;

// $userModel = new DbProvider('pgsql:host=127.0.0.1;dbname=teashop' , 'ri3567' , 'IISuess1120');
// echo $userModel -> test();

$dbProviderTest = new DbProvider();
echo $dbProviderTest->test();



?>