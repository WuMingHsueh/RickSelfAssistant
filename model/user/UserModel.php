<?php
namespace WuMingHsueh\SelfAssistant\Model\User;

use WuMingHsueh\SelfAssistant\Model\Database\DbProvider;

class UserModel 
{
    private $dbProvider ;

    private $userId;
    private $userPwd;


    public function __construct()
    {
        $this -> dbProvider = new DbProvider();
    }

    public function registerUser(Type $var = null)
    {

    }

    public function loginProcess(Type $var = null)
    {

    }

    public function logoutProcess()
    {
        return DB_USER;
    }

   public function test()
   {
       echo $this->dbProvider->test();

   }
}
?>