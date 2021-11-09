<?php
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
    <title>Add Classification | PHP Motors</title>
</head>

<body>
    <div class="container">

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340/phpmotors/common/header.php'; ?>


        <nav class="navigation">
            <?php echo $navList; ?>
        </nav>
        <main>
            <h1>Add Classification</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/CS340/phpmotors/vehicles/index.php" method="post">
                <label for="classificationName">Class</label> 
                <span>The new class is limited to 30 characters</span>
                <input name="classificationName" id="classificationName" placeholder="Ex: Lemon" pattern = "\w{1,30}" required>
                <input type="submit" name="submit" id="classbtn" value="New Class">
                <input type="hidden" name="action" value="newClass">
            </form>
        </main>

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340//phpmotors/common/footer.php'; ?>


    </div>
</body>

</html>