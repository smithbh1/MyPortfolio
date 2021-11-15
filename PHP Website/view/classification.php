<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title><?php echo $classificationName; ?> vehicles | PHP Motors</title>
</head>

<body>
    <div class="container">
        <header>
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340/phpmotors/common/header.php'; ?>

        </header>
        <nav class="navigation">
            <?php echo $navList ?>
        </nav>
        <main>
        <h1><?php echo $classificationName; ?> vehicles</h1>
            <?php if (isset($message)) {
                echo $message;
            }
            ?>
            <?php if (isset($vehicleDisplay)) {
                echo $vehicleDisplay;
            } ?>
            
        </main>
        <footer>
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/CS340//phpmotors/common/footer.php'; ?>

        </footer>
    </div>
</body>

</html>