<?php
$classifList = '<select name="classificationId" id="classificationId">';
$classifList .= "<option>Choose a Car Classification</option>";
foreach ($classifications as $classification) {
    $classifList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] === $classificationId) {
            $classifList .= ' selected ';
        }
    } elseif (isset($invInfo['classificationId'])) {
        if ($classification['classificationId'] === $invInfo['classificationId']) {
            $classifList .= ' selected ';
        }
    }
    $classifList .= ">$classification[classificationName]</option>";
}
$classifList .= '</select>';
?><?php
    if ($_SESSION['clientData']['clientLevel'] < 2) {
        header('location: /phpmotors/');
        exit;
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
</head>

<body>
    <div class="container">

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340/phpmotors/common/header.php'; ?>


        <nav class="navigation">
            <?php echo $navList ?>
        </nav>
        <main>
        <h1><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/CS340/phpmotors/vehicles/index.php" method="post">
                <?php
                echo $classifList;
                ?>
                <label for="invMake">Make</label>
                <input type="text" name="invMake" id="invMake" readonly <?php if (isset($invMake)) {
                                                                            echo "value='$invMake'";
                                                                        } elseif (isset($invInfo['invMake'])) {
                                                                            echo "value='$invInfo[invMake]'";
                                                                        } ?>>

                <label for="invModel">Model</label>
                <input type="text" name="invModel" id="invModel" readonly <?php if (isset($invModel)) {
                                                                                echo "value='$invModel'";
                                                                            } elseif (isset($invInfo['invModel'])) {
                                                                                echo "value='$invInfo[invModel]'";
                                                                            } ?>>
                <label for="invDescription">Description</label>
                <textarea name="invDescription" id="invDescription" readonly>
                                                                            <?php if (isset($invDescription)) {
                                                                                echo $invDescription;
                                                                            } elseif (isset($invInfo['invDescription'])) {
                                                                                echo $invInfo['invDescription'];
                                                                            } ?></textarea>
                
                <input type="submit" name="submit" id="vehiclebtn" value="Delete Vehicle">
                <input type="hidden" name="action" value="deleteVehicle">
                <input type="hidden" name="invId" value=" <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
                <p>Confirm Vehicle Deletion. The delete is permanent.</p>
            </form>
        </main>

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340//phpmotors/common/footer.php'; ?>


    </div>
</body>

</html>