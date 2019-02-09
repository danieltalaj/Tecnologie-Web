<?php
include("database.php");

/*
$IDUser = 18;
$IDSkiresort = 6;
addToFavorites($IDUser, $IDSkiresort);
 */

// $data=json_decode($_POST['json']);
// $data = json_decode($_GET['data'],true);

// $data = json_decode($_POST['userData']);
// adding based on currently logged user is working!

$json_str = file_get_contents('php://input');
$addedSkiresorts = json_decode($json_str);
// $decoded = json_decode($_POST['userData']);


$UserName = $_SESSION["name"]; // based on currently loged user
// $IDSkiresort = 6; // change to user input later
if($addedSkiresorts){
    try{
        foreach($addedSkiresorts as $i){
            addToFavorites($UserName, $i);
        }
        echo json_encode("Selected skiresorts have been successfully added to your favorites!");
    }
    catch(Exception $e){
        echo json_encode($e);
    }
}
else{
    echo json_encode("You have not selected any skiresort. If you want to add a skiresort to your list of favorites, please, select it first!");
}
// addToFavorites($UserName, $IDSkiresort);

?>