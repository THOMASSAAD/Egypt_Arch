<?php 
require_once 'crud.php';
    $host = 'localhost';
    $db = 'arch-egypt';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8'; 
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
    } catch (PDOException $th) {
        throw new PDOException($th->getMessage(), (int)$th->getCode());
    }
    $crud = new crud($pdo);
?>
