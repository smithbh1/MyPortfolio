<?php

//Checks to make sure it is an email
function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
   }
//Checks to see if $clientPassword has at least 1 capital letter, 1 number, and 1 special character and is at least 8 characters long
function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
   }
//Gets the values from the main-model getClassifications function and builds the navigation
function displayClassifications($classifications){
    
    $navList = '<ul>';
    $navList .= "<li><a href='/CS340/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/CS340/phpmotors/vehicles/?action=classification&classificationName=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
}
    $navList .= '</ul>';

    return $navList;
}
//Checks $classificationName to make sure it is between 1 and 30 characters
function checkClass($classificationName){

    $pattern = "/\w{1,30}/";

    return preg_match($pattern, $classificationName);
}
function checkNumber($number){

    $pattern = "/\d{1,6}/";

    return preg_match($pattern, $number);
}
function logout(){

    session_start();

    header('Location: /CS340/phpmotors/');

    unset($_SESSION['loggedin']);
    unset($_SESSION['clientData']);
    unset($_COOKIE['PHPSESSID']);
    session_destroy();
    
}
function buildClassificationList($classifications){ 
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 
    foreach ($classifications as $classification) { 
     $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } 
    $classificationList .= '</select>'; 
    return $classificationList; 
   } 

function getInvItemInfo($invId){
 $db = phpmotorsConnect();
 $sql = 'SELECT * FROM inventory WHERE invId = :invId';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
 $stmt->execute();
 $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $invInfo;
}
function buildVehiclesDisplay($vehicles){
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
     $dv .= '<li>';
     $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
     $dv .= '<hr>';
     $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
     $dv .= "<span>$vehicle[invPrice]</span>";
     $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
   }
