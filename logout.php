<?php
session_start();

//slide 23

$_SESSION = []; //clear all session data
session_destroy(); //clean up session id 

$login_message = 'You have been logged out';
include('login.php');

?>

<footer>
        <p>&copy; <?php echo date('Y'); ?>
        Eugene Shanga, 04/01/2024, IT202 Semester Project</p>
    </footer>
</html>