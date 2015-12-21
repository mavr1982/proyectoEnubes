<?php
class Database
{
    public static function Conectar()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=enubes;charset=utf8', 'root', 'admin');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}