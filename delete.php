<?php
$dsn = 'mysql:host=sql1.njit.edu;dbname=es472';
$username = 'es472';
$password = 'It202password.com';
//Eugene Shanga it202 04/05/23, Semester Project Phase 4  at54@njit.edu.


try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $exception) {
    $error_message = $exception->getMessage();
    include('database_error.php');
    echo $error_message;
    exit();
}

if (isset($_POST['batteryCode'])) {
    $id = $_POST['batteryCode'];
    $query = "DELETE FROM batteries 
                WHERE batteryCode = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
header("Location: productDisplay2.php");
?>