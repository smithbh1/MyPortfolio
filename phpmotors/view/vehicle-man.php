<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /CS340/phpmotors/');
 exit;
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Vehicle Management | PHP Motors</title>
</head>
<body>
    <div class="container">
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340/phpmotors/common/header.php'; ?> 

    
    <nav class="navigation">
    <?php echo $navList; ?> 
</nav>
    <main>
    <h1>Vehicle Manager</h1>

    <p><a href="http://localhost/CS340/phpmotors/vehicles/?action=addVehicle">Add Vehicle</a></p>
    <p><a href="http://localhost/CS340/phpmotors/vehicles/?action=addClass">Add Classification</a></p>

    <?php
if (isset($message)) { 
 echo $message; 
} 
if (isset($classificationList)) { 
 echo '<h2>Vehicles By Classification</h2>'; 
 echo '<p>Choose a classification to see those vehicles</p>'; 
 echo $classificationList; 
}
?>
<noscript>
<p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
</noscript>
<table id="inventoryDisplay"> </table>
</main>
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340//phpmotors/common/footer.php'; ?> 

    
    </div>
    <script src="../js/inventory.js"></script>
</body>
</html>
<?php unset($_SESSION['message']); ?>