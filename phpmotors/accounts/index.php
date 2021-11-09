<?php

session_start();
// Get the database connection file
require_once '../library/connection.php';
//Get accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';
//Get Main Model
require_once '../model/main-model.php';

$classifications = getClassifications();

$navList = displayClassifications($classifications);

  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL){
   $action = filter_input(INPUT_GET, 'action');
  }
  switch ($action){
      case 'home':
       include '../view/home.php';
       break;

      case 'registration':
        include '../view/registration.php';
        break;

      case 'register':
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));

        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        //Checking for an existing email address
        $existingEmail = checkExistingEmail($clientEmail);

        if($existingEmail === 1){
          $message = '<p>It looks like that email is already in use, try logging in.</p>';
          include '../view/login.php';
          exit; 
        }

        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
          $message = '<p>Please provide information for all empty form fields.</p>';
          include '../view/registration.php';
          exit; 
         }
         

         $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

         $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

         if($regOutcome === 1){
          setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
          $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
          header('Location: /CS340/phpmotors/accounts/?action=login');
          exit;
         } else {
          $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
          include '../view/registration.php';
          exit;
         }
        break;
        case 'Login':
          $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
          $clientEmail = checkEmail($clientEmail);
          $signInPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
          

          // Run basic checks, return if errors
          if (empty($clientEmail) || empty($signInPassword)) {
            $_SESSION['message'] = '<p class="notice">Please provide a valid email address and password.</p>';
           include '../view/login.php';
            exit;
          }
            
          // A valid password exists, proceed with the login process
          // Query the client data based on the email address
          $clientData = getClient($clientEmail);
          // Compare the password just submitted against
          // the hashed password for the matching client
          //$hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
          // If the hashes don't match create an error
          // and return to the login view
          if(!($signInPassword == $clientData['clientPassword'])) {
            $_SESSION['message'] = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
          }
          
          $_SESSION['loggedin'] = TRUE;          
        
          $_SESSION['clientData'] = $clientData;
          
          include '../view/admin.php';
          exit;

          break;

        case 'adminView':
          include '../view/admin.php';
          break;

        case 'login':
          include '../view/login.php';
          break;
   
        case 'registration':
          include '../view/registration.php';
          break;
        
        case 'Logout':
        
          header('Location: /CS340/phpmotors/');

          unset($_SESSION['loggedin']);
          unset($_SESSION['clientData']);
          unset($_COOKIE['PHPSESSID']);
          session_destroy();
          
          exit;
          
          break;
      
      default:
       include '../view/login.php';
     }
