<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Home | PHP Motors</title>
</head>
<body>
    <div class="container">
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340/phpmotors/common/header.php'; ?> 

    
    <nav class="navigation">
    <?php echo $navList; ?> 
</nav>
    <main>
    <h1>Welcome to PHP Motors!</h1>
    <div class="carInfo">
    <h2>DMC Delorean</h2>
    <p>3 Cup Holders</p>
    <p>Superman doors</p>
    <p>Fuzzy dice!</p>
    </div>
    <div id="delorean">
    <img src="./images/delorean.jpg" alt="Delorean car from popular movie">
    </div>
    <div id="ownToday">
    <img src="./images/site/own_today.png" alt="own today">
    </div>
    <div id="deloreanInfo">
    <div class="reviews">
        <h2>DMC Delorean Reviews</h2>
        <ul>
            <li>"So fast its almost like traveling in time." (4/5)</li>
            <li>"Coolest ride on the road." (4/5)</li>
            <li>"I'm feeling Marty McFly!" (5/5)</li>
            <li>"The most futuristinc ride of our day." (4/5)</li>
            <li>"80's livin and I love it!" (5/5)</li>
        </ul>
    </div>
    <div class="upgrade">
    <h2>Delorean Upgrades</h2>
    <div class="upgradeItems">
        <figure >
            <img class="upgradeImg" src="./images/upgrades/flux-cap.png" alt="flux capacitor">
            <figcaption><a href="home.php">Flux Capacitor</a></figcaption>
        </figure> 
        <figure>
            <img class="upgradeImg" src="./images/upgrades/flame.jpg" alt="flame decals">
            <figcaption><a href="home.php">Flame Decals</a></figcaption>
        </figure> 
        <figure>
            <img src="./images/upgrades/bumper_sticker.jpg" alt="bumper stickers">
            <figcaption><a href="home.php">Bumper Sticker</a></figcaption>
        </figure> 
        <figure>
            <img src="./images/upgrades/hub-cap.jpg" alt="hub caps">
            <figcaption><a href="home.php">Hub Caps</a></figcaption>
        </figure> 
    </div>
    </div>
    </div>
    </main>
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340/phpmotors/common/footer.php'; ?> 

    </div>
</body>
</html>