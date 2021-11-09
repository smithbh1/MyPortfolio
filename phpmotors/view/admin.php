<?php
if(!($_SESSION['loggedin'])){
    header('Location: /CS340/phpmotors/');
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin | PHP Motors</title>
</head>
<body>
    <div class="container">
    <header>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340/phpmotors/common/header.php'; ?> 

    </header>
    <nav class="navigation">
 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340//phpmotors/common/navigation.php'; ?> 
</nav>
    <main>
    <h1><?php
    echo $_SESSION['clientData']['clientFirstname'];
    echo $_SESSION['clientData']['clientLastname'];
    ?></h1>
    <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                   }
                   
                ?>
    <p>You are logged in as <?php $_SESSION['clientData']['clientFirstname'] ?></p>
    <ul>
        <li>First Name:<?php echo $_SESSION['clientData']['clientFirstname'];?></li>
        <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname'];?></li>
        <li>Email Address: <?php echo $_SESSION['clientData']['clientEmail'];?></li>
    </ul>
    <a href="http://localhost/CS340/phpmotors/accounts/?action=clientUpdate">Update Account Information</a>
    <?php
    if ($_SESSION['clientData']['clientLevel'] > 1){
        echo "<h2>Vehicle Managment</h2>";
        echo "<p>This link is for managing inventory for administrative clients only: <a href='../vehicles'>vehicle controller</a></p>";
    }
    ?>
    </main>
    <footer>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340//phpmotors/common/footer.php'; ?> 

    </footer>
    </div>
</body>
</html>