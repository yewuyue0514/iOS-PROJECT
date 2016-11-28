<?php

/*  
 * Student Info: Name=Wei Jin, ID=9983
 * Subject: NPU_2016_Fall_CS556(A)_Team_Project
 * Author: wei jin 
 * Filename: dbcontext.php 
 * Date and Time: Nov 20, 2016 6:04:01 PM 
 * Project Name: CS556_Team_Project 
 */ 
class DBContext {

    private static $dsn = 'mysql:host=us-cdbr-azure-west-b.cleardb.com;port=3306;dbname=daycaredb';
    private static $username = 'b117bca24bb891';
    private static $passwd = '331a488c';
    private static $db;

    private function __construct() {
        
    }

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$passwd);
            } catch (PDOException $ex) {
                $error_message = $ex->getMessage();
                include('../errors/datebase_error.php');
                exit();
            }
        }
        return self::$db;
    }

}
