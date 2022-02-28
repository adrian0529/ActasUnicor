<?php
class database{

    public static function conectar(){
    
        $pdo = new PDO('mysql:host=127.0.0.1:33065;dbname=actas2022;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
?>