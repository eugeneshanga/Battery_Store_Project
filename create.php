<?php
require_once('storeDefinition.php');

// Get the row info
$queryRow = 'SELECT * FROM batteryCategories ORDER BY batteryCategoryID';
$statement = $db->prepare($queryRow);
$statement->execute();
$batteries = $statement->fetchAll();
$statement->closeCursor();

$queryMaxCode = 'SELECT MAX(batteryCode) AS largest_code FROM batteries;';
$stmt = $db->query($queryMaxCode);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$largestCode = $result['largest_code'];
?>

<!DOCTYPE html>
<html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PowerUp Batteries | Create</title>
    <link rel="stylesheet" href="create.css">
    <link rel="shortcut icon" href="images/batteryStoreLogo.jpg">
</head>
<header id="container">
    <img src="images/batteryStoreLogo.jpg" alt="logo" class="logo">
    <?php include("header.php")?>
</header>

<body>
    <header>
        <h1 id="pm">Product Manager</h1>
    </header>
    <main>
        <h1>Add Product</h1>
        <form action="addToDatabase.php" method="post" id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
                <?php foreach ($batteries as $battery) : ?>
                    <option value="<?php echo $battery['batteryCategoryID']; ?>">
                        <?php echo $battery['batteryCategoryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label>Code:</label>
            <input type="number" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label> Battery Description:</label>
            <textarea name="description" rows="4" cols="35"></textarea><br>

            <label>List Price:</label>
            <input type="number" name="price" step="0.01" min="0" max="100000"><br>


            <label>&nbsp;</label>
            <input type="reset" value="Reset">
            <input type="submit" value="Add Product"><br>


        </form>
        <p><a href="productDisplay.php">View Product List</a></p>
        <script>
            // Function to validate the form inputs
            function validateForm() {
                // Get the form inputs
                var code = document.forms["add_product_form"]["code"].value;
                var name = document.forms["add_product_form"]["name"].value;
                var description = document.forms["add_product_form"]["description"].value;
                var price = document.forms["add_product_form"]["price"].value;

                // Check the code field
                if (code == "" || code <= <?php echo $largestCode; ?>) {
                    alert("Invalid code input. The code already taken or entered blank value");
                    return false;
                }

                // Check the name field
                if (name == "" || name.length < 10 || name.length > 100) {
                    alert("Invalid name input. The name should not be blank and should have a length between 10 and 100 characters.");
                    return false;
                }

                // Check the description field
                if (description == "" || description.length < 10 || description.length > 255) {
                    alert("Invalid description input. The description should not be blank and should have a length between 10 and 255 characters.");
                    return false;
                }

                // Check the price field
                if (price == "" || price <= 0 || price > 100000) {
                    alert("Invalid price input. The price should not be blank, should not be negative or zero, and should not exceed $100,000.");
                    return false;
                }

                // Return true if all inputs are valid
                return true;
            }

            // Attach the validateForm function to the submit event of the form
            document.forms["add_product_form"].addEventListener("submit", function(event) {
                if (!validateForm()) {
                    // Prevent the form from submitting if the inputs are invalid
                    event.preventDefault();
                }
            });
        </script>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?>
            Eugene Shanga, 03/18/2024 IT202, Semester Project</p>
    </footer>
</body>

</html>