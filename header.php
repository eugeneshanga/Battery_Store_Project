<style>
    /* Style for the welcome message */
    #welcome-message {
        font-size: 100px !important; /* Adjust the font size as needed */
        margin-right: 100px !important; /* Adjust the right margin as needed */
    }
</style>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start session if not already started
require_once('storeDefinition.php');

// Check if the user is logged in
if (isset($_SESSION['is_valid']) && $_SESSION['is_valid'] == true && isset($_SESSION['email'])) {
    // Fetch first and last names based on the logged-in user's email
    $email = $_SESSION['email']; // Assuming you have stored the email in a session variable
    $query = 'SELECT firstName, lastName FROM batteryManagers WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    // Display welcome message with first and last names
    if ($user) {
        echo "Welcome, " . $user['firstName'] . " " . $user['lastName'];
    } else {
        echo "Welcome, " . $_SESSION['email']; // Fallback to email if first and last names not found
    }
}
?>
<nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <?php if (isset($_SESSION['is_valid'])) { ?>
            <li><a href="create.php">Create</a></li>
        <?php } ?>
        <li><a href="productDisplay2.php">Batteries</a></li>
        <?php if (isset($_SESSION['is_valid'])) { ?>
            <li><a href="shippingForm.php">Shipping</a></li>
        <?php } ?>

        <?php if (isset($_SESSION['is_valid'])) { ?>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        <?php } else { ?>
            <li>
                <a href="login.php">Login</a>
            </li>
        <?php } ?>
    </ul>
</nav>