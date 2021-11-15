<?php
function phpmotorsConnect()
{
    /* Proxy Connection to PHPmotors database */

    $server = '127.0.0.1';
    $dbname = 'phpmotors';
    $username = 'proxy';
    $password = 'lYR4w8hMs2([A]LJ';
    $dsn = "mysql:host=$server;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    //Connection object creation and variable assignment

    try {
        $link = new PDO($dsn, $username, $password, $options);
        return $link;
    } catch (PDOException $e) {
        header('Location: ../view/500.php');
        exit;
    }
}
phpmotorsConnect();
?>