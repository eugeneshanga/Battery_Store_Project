<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> PowerUp Battery | Home </title>
        <link rel="stylesheet" href="battery_home.css">
        <link rel="shortcut icon" href="images/batteryStoreLogo.jpg">
    </head>
    <body>
        
        <header id="container">
            <img src="images/batteryStoreLogo.jpg" alt="logo" width="150" height="150" style="float: left;">
            <?php include("header.php")?>
            <h1 id="Store">PortaBattery</h1>
            <p id="store_description"> PowerUp Portable Batteries was founded in 2015 with a mission to provide reliable and innovative power solutions for the modern lifestyle. 
                Specializing in portable chargers, power banks, and related accessories, our store caters to the growing demand for convenient, on-the-go charging options. Our 
                carefully curated selection features products from leading brands renowned for their quality and durability. Whether you're a busy professional, a frequent traveler, 
                or an outdoor enthusiast, PowerUp Portable Batteries is committed to keeping you connected anytime, anywhere. With a focus on customer satisfaction and technological advancement, 
                we strive to empower our customers with the freedom to stay charged and connected in today's fast-paced world.
            </p>

            <h2 id="top_sellers">Top selling Batteries</h2>
        </header>
        <main id="pics">
            <figure>
                <img id="img1" src="images/batterySet1.jpg" alt="Battery 1" height="300"/>
                <figcaption id="figcap1">Anker - 3-in-1 Cube with MagSafe - Gray</figcaption>
            </figure>
            <figure>
                <img id="img3" src="images/batterySet2.jpg" alt="Battery 2" height="300"/>
                <figcaption id="figcap2">ToughTested - Solar24 24,000 mAh Portable Charger for Most USB-Enabled Devices - Black - Front_ZoomToughTested - Solar24 24,000 mAh Portable Charger for Most USB-Enabled Devices 
                    - Black</figcaption>
            </figure>
            <figure>
                <img id="img2" src="images/batterySet3.jpg" alt="Battery 3" height="300"/>
                <figcaption id="figcap3">Anker - MagGo Magnetic Power Bank with Kickstand (10000mAh, 20W) - Black</figcaption>
            </figure>
            <figure>
                <img id="img4" src="images/batterySet4.jpg" alt="Battery 4" height="300"/>
                <figcaption id="figcap4">myCharge - Adventure H2O Turbo 10,050 mAh Portable Charger for Most USB Enabled Devices - Gray</figcaption>
            </figure>
            <span class="stretch"></span>
        </main>

        <footer>
        <p>&copy; <?php echo date('Y'); ?>
        Eugene Shanga, 02/13/24, IT202, Semester Project</p>
    </footer>

    </body>
    
</html>