<?php
$classificationList = "<select id='classId' name='classificationId'>";
foreach($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
        if($classification['classificationId'] === $classificationId){
            $classificationList .= ' selected ';
        }
    }
    $classificationList .= ">$classification[classificationName]</option>";
    
  }
  $classificationList .='</select>';
?><?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add Vehicle | PHP Motors</title>
</head>

<body>
    <div class="container">

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340/phpmotors/common/header.php'; ?>


        <nav class="navigation">
        <?php echo $navList ?>
        </nav>
        <main>
            <h1>Add Vehicle</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/CS340/phpmotors/vehicles/index.php" method="post">
            <?php
            echo $classificationList;
            ?>
            <label for="invMake">Make</label>
            <input name="invMake" id="invMake" type="text" <?php if(isset($invMake)) {echo "value='$invMake'";}?>required>
            <label for="invModel">Model</label>
            <input name="invModel" id="invModel" type="text" <?php if(isset($invModel)) {echo "value='$invModel'";}?>required>
            <label for="invDescription">Description</label>
            <textarea name="invDescription" id="invDescription" rows="10" cols="15" placeholder="Describe here..." required><?php if(isset($invDescription)) {echo $invDescription;}?></textarea>
            <label for="invImage">Image Path</label>
            <input name="invImage" id="invImage" value="CS340/phpmotors/images/no-image.png" <?php if(isset($invImage)) {echo "value='$invImage'";}?>required>
            <label for="invThumbnail">Image Thumbnail</label>
            <input name="invThumbnail" id="invThumbnail" value="CS340/phpmotors/images/no-image.png" <?php if(isset($invThumbnail)) {echo "value='$invThumbnail'";}?>required>
            <label for="invPrice">Price</label>
            <input name="invPrice" id="invPrice" placeholder="Ex: 15000" <?php if(isset($invPrice)) {echo "value='$invPrice'";}?>required>
            <label for="invStock"># in Stock</label>
            <input name="invStock" id="invStock" placeholder="Ex: 7" pattern = "/\d{1,}/" <?php if(isset($invStock)) {echo "value='$invStock'";}?>required>
            <label for="invColor">Car Color</label>
            <input name="invColor" id="invColor" placeholder="Ex: Brown" <?php if(isset($invColor)) {echo "value='$invColor'";}?>required>
            <input type="submit" name="submit" id="vehiclebtn" value="Add Vehicle">
            <input type="hidden" name="action" value="newVehicle">
            </form>
        </main>

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340//phpmotors/common/footer.php'; ?>


    </div>
</body>

</html>