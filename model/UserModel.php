<?php
namespace WuMingHsueh\SelfAssistant\Model\User;

include_once dirname(__FILE__) . '/DbProvider.php';
use WuMingHsueh\SelfAssistant\Model\DbWork\DbProvider;

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
       return json_encode($this->dbProvider->test(), JSON_UNESCAPED_UNICODE);

   }
}
?>