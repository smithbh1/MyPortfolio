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
    <title>Update Account Information | PHP Motors</title>
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
    <h1>Update Account Information</h1>

    <form action = "" method = "post">
    <label for="clientFirstname">Make</label>
                <input type="text" name="clientFirstname" id="clientFirstname" required <?php if (isset($clientFirstname)) {
                                                                            echo "value='$clientFirstname'";
                                                                        } elseif (isset($invInfo['clientFirstname'])) {
                                                                            echo "value='$invInfo[clientFirstname]'";
                                                                        } ?>>

                <label for="clientLastname">Model</label>
                <input type="text" name="clientLastname" id="clientLastname" required <?php if (isset($clientLastname)) {
                                                                                echo "value='$clientLastname'";
                                                                            } elseif (isset($invInfo['clientLastname'])) {
                                                                                echo "value='$invInfo[clientLastname]'";
                                                                            } ?>>
                <label for="clientEmail">Description</label>
                <textarea name="clientEmail" id="clientEmail" required>
                                                                            <?php if (isset($clientEmail)) {
                                                                                echo $clientEmail;
                                                                            } elseif (isset($invInfo['clientEmail'])) {
                                                                                echo $invInfo['clientEmail'];
                                                                            } ?></textarea>
                
                <input type="submit" name="submit" id="vehiclebtn" value="Update Vehicle">
                <input type="hidden" name="action" value="updateVehicle">
                <input type="hidden" name="invId" value=" <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
            </form>

    </form>

    </main>
    <footer>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340//phpmotors/common/footer.php'; ?> 

    </footer>
    </div>
</body>
</html>