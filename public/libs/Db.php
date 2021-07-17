<?php

class Db {
    public static function getHandle() {

        static $dbh = null;

        if (null === $dbh) {

            // $db_conf = Config::get('db');
            $db_conf = [
                "user" => "root",
                "pass" => "",
                "host" => "mysql",
                "dbname" => "techc",
                "charset" => "utf8mb4",
            ];

            $options = [
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            ];
            $dsn = "mysql:host={$db_conf['host']};dbname={$db_conf['dbname']};charset={$db_conf['charset']}";
            
            try {
                $dbh = new \PDO($dsn, $db_conf['user'], $db_conf['pass'], $options);
            } catch (\PDOException $e) {
                echo $e->getMessage();
                exit;
            }
        }

        return $dbh;
    }
}
