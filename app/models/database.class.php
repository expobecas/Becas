<?php
class Database
{
    private static $connection = null;
    private static $statement = null;
    private static $id = null;
    private static $error = null;

    private function connect()
    {
        $server = "localhost";
<<<<<<< HEAD
        $database = "dbecas2";
=======
        $database = "dbecas";
>>>>>>> cfe906eb485ebdfc6ecc1b863486f93c13197f0d
        $username = "root" /*"Expo_becas"*/;
        $password = ""/*"becasricaldone"*/;
        try
        {
            @self::$connection = new PDO("mysql:host=$server; dbname=$database; charset=utf8", $username, $password);
        }
        catch(PDOException $exection)
        {
            throw new Exception($exection->getCode());
        }
    }

    private function desconnect()
    {
        self::$error = self::$statement->errorInfo();
        self::$connection = null;
    }

    public static function executeRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        $state = self::$statement->execute($values);
        self::$id = self::$connection->lastInsertId();
        self::desconnect();
        return $state;
    }

    public static function getRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetch();
    }

    public static function getRows($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetchAll();
    }

    public static function getLastRowId()
    {
        return self::$id;
    }

    public static function getException()
    {
        if(self::$error[0] == "00000")
        {
            return false;
        }
        else
        {
            return self::$error[1];
        }
    }
}
?>