<?php
namespace WuMingHsueh\User;

include './dbconfig.php';

class UserModel 
{
   private $pdo;
   private $userId;
   private $userPwd;

   public function UserModel()
   {
       $pdo = new \PDO(DSN ,DB_USER , DB_PASSWORD);
   }

   public function registerUser(Type $var = null)
   {
       # code...
   }

   public function loginProcess(Type $var = null)
   {
       # code...
   }

   public function logoutProcess()
   {
        return \DB_USER;
   }
}
?>