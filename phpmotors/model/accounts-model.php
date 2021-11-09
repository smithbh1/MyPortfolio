<?php
//Accounts Model
function regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword){
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
    $clientLastname = filter_input(INPUT_POST, 'clientLastname');
    $clientEmail = filter_input(INPUT_POST, 'clientEmail');
    $hashedPassword = filter_input(INPUT_POST, 'clientPassword');
    
    $db = phpmotorsConnect();

    $sql = 'INSERT INTO clients (clientFirstname, clientLastname,clientEmail, clientPassword)
        VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword)';
    
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientPassword', $hashedPassword, PDO::PARAM_STR);
    
    $stmt->execute();

    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return $rowsChanged;
   }
//Check for an existing email address
function checkExistingEmail($clientEmail){
    $db =  phpmotorsConnect();

    $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';

    $stmt = $db->prepare($sql);

    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);

    $stmt->execute();

    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

    $stmt->closeCursor();

    if(empty($matchEmail)){
     return 0;
    } else {
     return 1;
    }
}
function getClient($clientEmail){
    $db = phpmotorsConnect();
    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :clientEmail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
   }
?>