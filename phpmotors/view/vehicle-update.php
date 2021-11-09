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
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Modify $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Modify $invMake $invModel";
            } ?> | PHP Motors</title>
</head>

<body>
    <div class="container">

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340/phpmotors/common/header.php'; ?>


        <nav class="navigation">
            <?php echo $navList ?>
        </nav>
        <main>
            <h1><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                    echo "Modify $invInfo[invMake] $invInfo[invModel]";
                } elseif (isset($invMake) && isset($invModel)) {
                    echo "Modify$invMake $invModel";
                } ?></h1>
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
                <input type="text" name="invMake" id="invMake" required <?php if (isset($invMake)) {
                                                                            echo "value='$invMake'";
                                                                        } elseif (isset($invInfo['invMake'])) {
                                                                            echo "value='$invInfo[invMake]'";
                                                                        } ?>>

                <label for="invModel">Model</label>
                <input type="text" name="invModel" id="invModel" required <?php if (isset($invModel)) {
                                                                                echo "value='$invModel'";
                                                                            } elseif (isset($invInfo['invModel'])) {
                                                                                echo "value='$invInfo[invModel]'";
                                                                            } ?>>
                <label for="invDescription">Description</label>
                <textarea name="invDescription" id="invDescription" required>
                                                                            <?php if (isset($invDescription)) {
                                                                                echo $invDescription;
                                                                            } elseif (isset($invInfo['invDescription'])) {
                                                                                echo $invInfo['invDescription'];
                                                                            } ?></textarea>
                <label for="invImage">Image Path</label>
                <input name="invImage" id="invImage" value="CS340/phpmotors/images/no-image.png" <?php if (isset($invImage)) {
                                                                                                        echo "value='$invImage'";
                                                                                                    } ?>required>
                <label for="invThumbnail">Image Thumbnail</label>
                <input name="invThumbnail" id="invThumbnail" value="CS340/phpmotors/images/no-image.png" <?php if (isset($invThumbnail)) {
                                                                                                                echo "value='$invThumbnail'";
                                                                                                            } elseif (isset($invInfo['invThumbnail'])) {
                                                                                                                echo "value = $invInfo[invThumbnail]";
                                                                                                            } ?>required>
                <label for="invPrice">Price</label>
                <input name="invPrice" id="invPrice" placeholder="Ex: 15000" required <?php if (isset($invPrice)) {
                                                                                            echo "value='$invPrice'";
                                                                                        } elseif (isset($invInfo['invPrice'])) {
                                                                                            echo "value= $invInfo[invPrice]";
                                                                                        } ?>>
                <label for="invStock"># in Stock</label>
                <input name="invStock" id="invStock" placeholder="Ex: 7" pattern="\d{1,}" required <?php if (isset($invStock)) {
                                                                                                            echo "value ='$invStock'";
                                                                                                        } elseif (isset($invInfo['invStock'])) {
                                                                                                            echo "value = $invInfo[invStock]";
                                                                                                        } ?>>
                <label for="invColor">Car Color</label>
                <input name="invColor" id="invColor" placeholder="Ex: Brown" required <?php if (isset($invColor)) {
                                                                                            echo "value='$invColor'";
                                                                                        } elseif (isset($invInfo['invColor'])) {
                                                                                            echo "value = $invInfo[invColor]";
                                                                                        } ?>>
                <input type="submit" name="submit" id="vehiclebtn" value="Update Vehicle">
                <input type="hidden" name="action" value="updateVehicle">
                <input type="hidden" name="invId" value=" <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
            </form>
        </main>

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340//phpmotors/common/footer.php'; ?>


    </div>
</body>

</html>