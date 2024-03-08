<?php
    //get data from the form
    $first = filter_input(INPUT_POST, 'first');
    $last = filter_input(INPUT_POST, 'last');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip_code = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);
    $s_date = filter_input(INPUT_POST, 's_date');
    $order_number = filter_input(INPUT_POST, 'order_number', FILTER_VALIDATE_INT);
    $length = filter_input(INPUT_POST, 'length', FILTER_VALIDATE_INT);
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

    
    $price_f = '$' . number_format($price, 2);
    $dimensions = $length * $height

    
?>

<html>
    <head>
        <title>PowerUp Batteries | Shipping</title>
        <link rel="stylesheet" href="shippingResult.css">
        <link rel="shortcut icon" href="images/batteryStoreLogo.jpg">
    </head>
    <header>
        <h1 id="label">Shipping Label</h1>  
    </header>
    <body>
        <main>
        <span id="From"><?php echo "Fulfillment Center", "<br>", " 7224 Waverly Place<br> New York NY 10223 ";?></span>
        
        <span id="dimensions"><?php echo "Package Dimensions: " . $dimensions ."in"; ?></span>
        <br>
        <br>
        <br>
        <br>
        <label id="ship_to"> Ship To:</label>
        <span id="addy"><?php echo "<br>". $first ." ". $last . "<br>", $address ."<br> ".  $city ."     ". $state ."   ". $zip_code; ?></span>
        <br>
        <br>
        <br>
        <br>
        <hr>
        <div id="class_and_carrier">
            <span><?php  echo "UPS Standard"; ?></span>
            <br>
            <label>Tracking #:</label>
            <span><?php echo " 1Z X37 301 68 9786 9331"; ?></span>
            </div>
        <hr>
        <span> <img src="images/ups_track.GIF"/></span>

        <hr>
        <br>
        <span><h4>Additional Information</h4></span>
        <label>Order Number:</label>
        <span><?php echo $order_number; ?></span>
        <br>
        <label>Ship date</label>
        <span><?php echo $s_date;?></span>
        <br>
        <label>Package Declared Value:</label>
        <span><?php echo " " . $price_f; ?></span>

        </main>

        <footer>
        <p>&copy; <?php echo date('Y'); ?>
        Eugene Shanga, IT202 Project</p>
    </footer>
    </body>
</html>