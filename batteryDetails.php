<?php
require('storeDefinition.php');

//Get battery ID from URL
$batteryID = filter_input(INPUT_GET, 'battery_id', FILTER_VALIDATE_INT);
if ($batteryID == NULL || $batteryID == FALSE) {
    $error = "Invalid battery ID.";
} else {
    // Get the battery record from the database
    $queryBatteries = 'SELECT * FROM batteries
                    WHERE batteryCode = :batteryCode';
    $statement = $db->prepare($queryJewelry);
    $statement->bindValue(':batteryCode', $batteryID);
    $statement->execute();
    $batteries = $statement->fetch();
    $statement->closeCursor();

    // Check if the jewelry record exists
    if (empty($batteries)) {
        $error = "Battery record not found.";
    }
}

?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerUp Batteries | Battery Details</title>
    <link rel="stylesheet" href="productDisplay.css">
    <link rel="shortcut icon" href="images/batteryStoreLogo.png">
</head>
<header id="container">
    <img src="images/batteryStoreLogo.png" alt="logo" class="logo">
    <?php include("header.php") ?>
</header>

<main>
    <?php if (isset($error)) {
        echo '<p>' . $error . '</p>';
    } else {
    ?>
        <h1>Battery Details</h1>
        <div class="details">
            <img id="battery-image" src="<?php echo $batteries['imagePath']; ?>" alt="Battery Image">
            
            <ul>
                <li><strong>Code:</strong> <?php echo $batteries['batteryCode']; ?></li>
                <li><strong>Name:</strong> <?php echo $batteries['batteryName']; ?></li>
                <li><strong>Price:</strong> <?php echo $batteries['price']; ?></li>
                <li><strong>Description:</strong> <?php echo $batteries['descript']; ?></li>
            </ul>
        </div>
    <?php } ?>
    <script>
        const image = document.querySelector('#battery-image');

        image.addEventListener('mouseover', function() {
          this.style.filter = 'grayscale(100%)';
        });

        image.addEventListener('mouseout', function() {
          this.style.filter = 'none';
        });
    </script>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?>
        Eugene Shanga IT202004, Semester Project</p>
</footer>

</html>