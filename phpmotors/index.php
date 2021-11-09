<?php

session_start();

// Get the database connection file
require_once 'library/connection.php';

//Get Functions
require_once 'library/functions.php';

//Get Main Model
require_once 'model/main-model.php';

$classifications = getClassifications();

$navList = displayClassifications($classifications);

  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL){
   $action = filter_input(INPUT_GET, 'action');
  }

  if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
   }

  switch ($action){
      
      
      default:
       include 'view/home.php';
     }


?>