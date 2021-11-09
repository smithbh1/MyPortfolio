<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Register | PHP Motors</title>
</head>

<body>
    <div class="container">

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340/phpmotors/common/header.php'; ?>


        <nav class="navigation">
        <?php echo $navList; ?>
        </nav>
        <main>
            <h1>Register</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="index.php" method="post">
                <label for="fname">First Name</label>
                <input name="clientFirstname" id="fname" type="text" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}   ?> required>
                <label for="clientLastname">Last Name</label>
                <input type="text" name="clientLastname" id="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?> required>
                <label for="email">Email</label>
                <input type="email" name="clientEmail" id="email" placeholder="my@example.com" <?php if(isset($clientEmail)) {echo "value='$clientEmail'";}?> required>
                <label for="password">Password</label>
                <span>Password must be at least 8 characters and use at least 1 uppercase character, 1 number, and one special character.</span>
                <input name="clientPassword" id="password" type="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                <input type="submit" name="submit" id="regbtn" value="Register">
                <input type="hidden" name="action" value="register">
            </form>

        </main>

        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340//phpmotors/common/footer.php'; ?>


    </div>
</body>

</html>