<?php

session_start();
// Get the database connection file
require_once '../library/connection.php';
// Get the Vehicle model for use as needed
require_once '../model/vehicles-model.php';
//Get functions
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
    
    case 'addVehicle':
        include '../view/add-vehicle.php';
        break;
        
    case 'addClass':
        include '../view/add-classification.php';
        break;
    case 'newVehicle':
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
        $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING));
        $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING));
        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING));
        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_STRING));

        $invPrice = checkNumber($invPrice);
        $invStock = checkNumber($invStock);

        if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit; 
           }
           $addOutcome = newVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
  
           if($addOutcome === 1){
            $message = "<p>Thanks for adding $invStock of your $invMake $invModel(s).</p>";
            include '../view/add-vehicle.php';
            exit;
           } else {
            $message = "<p>Sorry, but the addition failed. Please try again.</p>";
            include '../view/add-vehicle.php';
            exit;
           }
          break;
    case 'newClass':
        $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING));

        $classificationName= checkClass($classificationName);

        if (empty($classificationName)){
            $message = "<p>Please provide information for all empty form fields and make sure it is less than 30 characters</p>";
            include '../view/add-classification.php';
            exit;
        }
            $classOutcome = newClassification($classificationName);
            if($classOutcome === 1){
                header('Location: ../vehicles/index.php?action=addClass');
                exit;
            }else {
                $message = "<p>Sorry, but the addition failed. Please try again.</p>";
                include '../view/add-classification.php';
                exit;
               }
    case 'getInventoryItems':
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);

        $inventoryArray = getInventoryByClassification($classificationId);

        echo json_encode($inventoryArray);
        break;
    case 'mod':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if(count($invInfo) < 1){
            $message = 'Sorry, no vehicle information could be found.';
           }
            include '../view/vehicle-update.php';
            exit;
        break;
        case 'updateVehicle':
            $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
            $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
            $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
            $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
            $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
            $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
            $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
            $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
            $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

            if (empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)) {
            $message = '<p>Please complete all information for the new item! Double check the classification of the item.</p>';
            include '../view/new-item.php';
            exit;
            }
            $updateResult = updateVehicle($classificationId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $invId);
            if ($updateResult) {
                $message = "<p class='notify'>Congratulations, the $invMake $invModel was successfully updated.</p>";
                $_SESSION['message'] = $message;
                header('location: /CS340/phpmotors/vehicles/');
                exit;
            } else {
                $message = "<p>Error. The vehicle was not updated.</p>";
                include '../view/vehicle-update.php';
                exit;
            }
            break;
        case 'del':
            $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
            $invInfo = getInvItemInfo($invId);
            if(count($invInfo) < 1){
                $message = 'Sorry, no vehicle information could be found.';
           }
                include '../view/vehicle-delete.php';
                exit;
            break;
        case 'deleteVehicle':
            $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
            $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
            $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

            $deleteResult = deleteVehicle($invId);
            if ($deleteResult) {
                $message = "<p class='notice'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
                $_SESSION['message'] = $message;
                header('location: /phpmotors/vehicles/');
                exit;
            } else {
                $message = "<p class='notice'>Error: $invMake $invModel was not
            deleted.</p>";
                $_SESSION['message'] = $message;
                header('location: /phpmotors/vehicles/');
                exit;
            }

            break;
        case 'classification':
            $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
            $vehicles = getVehiclesByClassification($classificationName);

            if(!count($vehicles)){
                $message = "<p class='notice'>Sorry, no $classificationName vehicles could be found.</p>";
              } else {
                $vehicleDisplay = buildVehiclesDisplay($vehicles);
              }
              
              include '../view/classification.php';
            break;
    default:
        $classificationList = buildClassificationList($classifications);
        include '../view/vehicle-man.php';
     }
