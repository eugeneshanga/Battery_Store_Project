<?php 
require('storeDefinition.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the row info
$queryRow = 'SELECT * FROM batteries ORDER BY batteryCategoryID';
$statement = $db->prepare($queryRow);
$statement->execute();
$batteries = $statement->fetchAll();
$statement->closeCursor();
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerUp Batteries | Portable Chargers</title>
    <link rel="stylesheet" href="productDisplay.css">
    <link rel="shortcut icon" href="images/batteryStoreLogo.jpg">
</head>

<body>

    <header id="container">
        <img src="images/batteryStoreLogo.jpg" alt="logo" class="logo">
    </header>

    <main>
        <h1 id="battery">Product List</h1>
        <div class="product-grid">
            <?php
            // Display battery information if available
            if (!empty($batteries)) {
                //Iterate through table to get each row
                foreach ($batteries as $battery) {
                    //Define items in row
                    $category = $battery['batteryCategoryID'];
                    $productName = $battery['batteryName']; 
                    $price = $battery['price']; 
                    $description = $battery['descript'];
                    $code = $battery['batteryCode'];

                    echo "<div class='product-name'>Name: $productName</div>";
                    //Check which category it is compared to category id in second table
                    if ($category == 1){
                        echo "<div class='product-categoryID'>Category: High Capacity Power Bank</div>";
                    }
                    if ($category == 2){
                        echo "<div class='product-categoryID'>Category: Slim Portable Charger</div>";
                    }
                    if ($category == 3){
                        echo "<div class='product-categoryID'>Category: Solar Powered Charger</div>";
                    }
                    if ($category == 4){
                        echo "<div class='product-categoryID'>Category: Rapid Charging Power Bank </div>";
                    }
                    if ($category == 5){
                        echo "<div class='product-description'>Category: Wireless Charging Power Bank</div>";
                    }
                    
                    //Display Data
                    echo "<div class='product'>";
                    echo "<div class='product-description'>Code: $code</div>";
                    echo "<div class='product-price'>Price: $price</div>";
                    echo "<div class='product-description'>$description</div>";
                    echo "<br> <br>";
                    echo "</div>";
                    echo "\n";
                }
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Eugene Shanga, 02/29/23, IT202 Semester Project</p>
    </footer>

</body>

</html>