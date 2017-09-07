<?php
namespace WuMingHsueh\SelfAssistant\Model\DbWork;

class DbConfig 
{
    CONST DB_HOST = '127.0.0.1';
    CONST DB_USER = '';
    CONST DB_PASSWORD = '';
    CONST DB_NAME = '';
    CONST DB_PORT = '5432';
    CONSt DB_TYPE = 'pgsql';
    const DSN = 'pgsql:host=' . self::DB_HOST . '; dbname=' . self::DB_NAME ;    
}


?>