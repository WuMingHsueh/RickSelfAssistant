<?php

include "../model/UserModel.php";

use WuMingHsueh\User\UserModel;

$userModel = new UserModel();

echo $userModel -> logoutProcess();


?>