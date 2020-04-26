<?php
class Connection
{
    public static function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=schedule;charset=utf8', 'root', '');
        return $pdo;
    }
}
