<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('storeDefinition.php');

function addBatteryManager($db, $email, $password, $firstName, $lastName) {
   $hash = password_hash($password, PASSWORD_DEFAULT);
   $query = 'INSERT INTO batteryManagers (emailAddress, password, firstName, lastName, dateCreated)
             VALUES (:email, :password, :firstName, :lastName, NOW())';
   $statement = $db->prepare($query);
   $statement->bindValue(':email', $email);
   $statement->bindValue(':password', $hash);
   $statement->bindValue(':firstName', $firstName);
   $statement->bindValue(':lastName', $lastName);
   $statement->execute();
   $statement->closeCursor();
}

addBatteryManager($db, 'manager2@example.com', 'password2', 'Dill', 'Pickle');
addBatteryManager($db, 'manager3@example.com', 'password3', 'Mary', 'Jane');


echo "Records inserted successfully.";
?>
