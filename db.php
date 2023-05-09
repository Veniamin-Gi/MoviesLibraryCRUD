<?php
// Подключаемся к БД

// Переменные для подключения
$host = 'localhost';
$db = 'mymovies';
$user = 'root';
$pass = '';

// Попытка подключения и сообщения ошибки подключения
try
{
    $pdo = new PDO("mysql: host= $host; dbname=$db", $user, $pass);  
} catch (PDOException $e)
{
    Echo 'Ошибка с соединение'.$e->getMessage();
}

?>