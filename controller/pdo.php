<?php

include dirname(__DIR__) . "/vendor/autoload.php";
use WuMingHsueh\SelfAssistant\Model\User\UserModel;

try {
    $model = new UserModel();
    $model->test();
} catch (\Exception $e)
{
    echo $e->getMessage()."<br>";
}

?>