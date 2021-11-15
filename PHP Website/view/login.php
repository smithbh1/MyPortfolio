<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login | PHP Motors</title>
</head>

<body>
    <div class="container">
        <?php //header 
        ?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340/phpmotors/common/header.php'; ?>


        <nav class="navigation">
        <?php echo $navList; ?>
        </nav>
        <main>
            <h1>Sign In</h1>
            <div class="form">
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                   }
                   
                ?>
                <form action="/CS340/phpmotors/accounts/index.php" method="post">
                    <label for="clientEmail">Email</label>
                    <input name="clientEmail" type="email" id="clientEmail" required placeholder="my@example.com" <?php if(isset($clientEmail)) {echo "value='$clientEmail'";}?>>
                    <label for="clientPassword">Password</label>
                    <input name="clientPassword" id="clientPassword" type="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                    <input type="submit" value="Login">
                    <input type="hidden" name="action" value="Login">
                </form>
            </div>
            <a href="http://localhost/CS340/phpmotors/accounts/?action=registration">Not a member yet?</a>
        </main>
        <?php //footer 
        ?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340//phpmotors/common/footer.php'; ?>


    </div>
</body>

</html>