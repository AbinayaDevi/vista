<?php

include 'db_details.php';

$link = mysqli_connect($host, $username, $password, $database);
//$link = mysqli_connect("localhost", "4fit", "motorinkz2016", "4fit_motorinkz");

 
// Check connection
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql ="INSERT INTO `edit` (room_no,room_name) VALUES ('".$_GET["name"]."','".$_GET["room_no"]."','".$_GET["check_in"]."','".$_GET["check_out"]."')";

if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>