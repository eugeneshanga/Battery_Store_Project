<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('storeDefinition.php');
if (!isset($login_message)) {
 $login_message = 'You must login to view this page.';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PowerUp Batteries | Login</title>
    <link rel="shortcut icon" href="images/batteryStoreLogo.jpg">
    <link rel="stylesheet" href="login.css">
  </head>
    <header id="container">
    <img src="images/batteryStoreLogo.jpg" alt="logo" class="logo">
    <?php include("header.php")?>
</header>
    </header>
  <body>
  <main>
    <h1 id="log">Login</h1>
    <form id="login_form" action="Authorize.php"  method="post">
      <label>Email:</label>
      <input type="text" name="email" value="email">
      <br>
      <label>Password:</label>
      <input type="password" name="password" value="password">
      <br>
      <input type="submit" value="Login">
    </form>
    <p id="message"><?php echo $login_message; ?></p>
  </main>
  <footer>
        <p>&copy; <?php echo date('Y'); ?>
        Eugene Shanga, IT202 Semester Project</p>
    </footer>
  </body>
</html>