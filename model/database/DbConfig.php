<?php
namespace WuMingHsueh\SelfAssistant\Model\Database;

class DbConfig 
{
    CONST DB_HOST = '';
    CONST DB_USER = '';
    CONST DB_PASSWORD = '';
    CONST DB_NAME = '';
    CONST DB_PORT = '5432';
    CONSt DB_TYPE = 'pgsql';
    const DSN = 'pgsql:host=' . self::DB_HOST . '; dbname=' . self::DB_NAME ;    
}


?>