<?php
$dsn = 'mysql:host=sql1.njit.edu;dbname=es472';
$username = 'es472';
$password = 'It202password.com';

try {
    $db = new PDO($dsn, $username, $password);   
} catch(PDOException $exception) {
    $error_message = $exception->getMessage();
    include('databaseTest.php');
    echo $error_message;
    exit();
}

// Check if the email and password provided by an administrator are valid
function is_valid_admin_login($email, $password) {
    global $db;
    $query = 'SELECT password FROM batteryManagers WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    if($row === false) {
        return false;
    } else {
        $hash = $row['password'];
        return password_verify($password, $hash);
    }
}
?>
