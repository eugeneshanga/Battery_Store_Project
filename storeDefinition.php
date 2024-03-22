<?php
$dsn = 'mysql:host=localhost;dbname=it202-es472-project';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);   
} catch(PDOException $exception) {
    $error_message = $exception->getMessage();
    include('databaseTest.php');
    echo $error_message;
    exit();
}
?>