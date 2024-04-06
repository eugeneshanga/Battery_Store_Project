<?php
require('storeDefinition.php');

//Get Category ID
$batteryCategoryID = filter_input(INPUT_GET, 'batteryCategoryID', FILTER_VALIDATE_INT);
if ($batteryCategoryID == NULL || $batteryCategoryID == FALSE) {
    $batteryCategoryID = 1;
}

// Get name for selected category 
$queryCategory = 'SELECT * FROM  batteryCategories
WHERE batteryCategoryID = :batteryCategoryID';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':batteryCategoryID', $batteryCategoryID);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['batteryCategoryName'];
$statement1->closeCursor();


// Get all categories 
$queryAllCategories = 'SELECT * FROM batteryCategories
                        ORDER BY batteryCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

//Get batteries for selected category
$queryProducts = 'SELECT * FROM batteries 
                    WHERE batteryCategoryID = :batteryCategoryID 
                    ORDER BY batteryCode';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':batteryCategoryID', $batteryCategoryID);
$statement3->execute();
$batteries = $statement3->fetchAll();
$statement3->closeCursor();
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerUp Batteries | Batteries</title>
    <link rel="stylesheet" href="productDisplay.css">
    <link rel="shortcut icon" href="images/batteryStoreLogo.jpg">
</head>
<header id="container">
    <img src="images/batteryStoreLogo.jpg" alt="logo" class="logo">
    <?php include("header.php") ?>
</header>

<main>
    <h1 id="battery">Battery List</h1>
    <aside>
        <!-- display a list of categories -->
        <h3 id="battery">Select a prefered category below</h3>
        <nav id="cats">
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="?batteryCategoryID=<?php echo $category['batteryCategoryID']; ?>">
                            <?php echo $category['batteryCategoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>
    <section>
        <!-- display a table of jewelry -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>


                <?php if (isset($_SESSION['is_valid'])) {
                ?>
                    <th>Function</th>
                <?php } ?>
            </tr>

            <?php foreach ($batteries as $b) : ?>
                <tr>
                    <td>
                        <a href="batteryDetails.php?battery_id=<?php echo $b['batteryCode']; ?>">
                            <?php echo $b['batteryCode']; ?>
                        </a>
                    </td>
                    <td><?php echo $b['batteryName']; ?></td>
                    <td class="right"><?php echo $b['price']; ?></td>
                    <td><?php echo $b['descript']; ?></td>
                    <?php if (isset($_SESSION['is_valid'])) { ?>
                        <td>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="batteryCode" value="<?php echo $b['batteryCode']; ?>">
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    <?php } ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?>
        Eugene Shanga, 04/01/2024 IT202, Semester Project</p>
</footer>

</html>