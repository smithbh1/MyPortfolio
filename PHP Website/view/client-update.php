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
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340/phpmotors/common/header.php'; ?> 

    
    <nav class="navigation">
 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340//phpmotors/common/navigation.php'; ?> 
</nav>
    <main>
    <h1>Update Account Information</h1>
    <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
            ?>
    <form action = "/CS340/phpmotors/accounts/index.php" method = "post">
    <label for="clientFirstname">First Name</label>
                <input type="text" name="clientFirstname" id="clientFirstname" required <?php if (isset($clientFirstname)) {
                                                                            echo "value='$clientFirstname'";
                                                                        } elseif (isset($clientData['clientFirstname'])) {
                                                                            echo "value='$clientData[clientFirstname]'";
                                                                        } ?>>

                <label for="clientLastname">Last Name</label>
                <input type="text" name="clientLastname" id="clientLastname" required <?php if (isset($clientLastname)) {
                                                                                echo "value='$clientLastname'";
                                                                            } elseif (isset($clientData['clientLastname'])) {
                                                                                echo "value='$clientData[clientLastname]'";
                                                                            } ?>>
                <label for="clientEmail">Email Address</label>
                <input type = "email" name="clientEmail" id="clientEmail" required <?php if (isset($clientEmail)) {
                                                                                echo "value = '$clientEmail'";
                                                                            } elseif (isset($clientData['clientEmail'])) {
                                                                                echo $clientData['clientEmail'];
                                                                            } ?>>
                
                <input type="submit" name="submit" id="clientbtn" value="Update Account">
                <input type="hidden" name="action" value="modClient">
                <input type="hidden" name="clientId" value=" <?php if(isset($clientData['clientId'])){ echo $clientData['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">

            </form>
            <h2>Update Password</h2>
            <form action="/CS340/phpmotors/accounts/index.php" method = "post">
        <label for="clientPassword">Password</label>
        <p>Updating the password is permanent</p>
        <p>Requires at least 8 characters and use at least 1 uppercase character, 1 number, and one special character</p>
        <input type = "text" name = "clientPassword" id = "clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>                                                                  
        <input type = "submit" name = "submit" id = "clientPassbtn" value = "Update Password">
        <input type = "hidden" name = "action" value = "modPassword">
        <input type = "hidden" name = "clientId" value = "<?php if(isset($clientData['clientId'])){ echo $clientData['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
    </form>
      

    </main>
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/CS340//phpmotors/common/footer.php'; ?> 

    
    </div>
</body>
</html>