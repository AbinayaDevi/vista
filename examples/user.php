<?php

include 'db_details.php';

$link = mysqli_connect($host, $username, $password, $database);
//$querye = "INSERT INTO `adduser` (country) VALUES ('$country')";
$sql = "INSERT INTO `adduser`(`name`, `mobile`, `email`, `gender`, `age`, `address`, `country`, `state`, `city`, `accommodation`, `roomno`, `roomrent`, `checkindate`, `checkoutdate`, `advanceamount`, `discount`) VALUES ('".$_GET["name"]."','".$_GET["mobile"]."','".$_GET["email"]."','".$_GET["gender"]."','".$_GET["age"]."','".$_GET["address"]."','".$_GET["country"]."','".$_GET["state"]."','".$_GET["city"]."','".$_GET["accommodation"]."','".$_GET["roomno"]."','".$_GET["roomrent"]."','".$_GET["checkindate"]."','".$_GET["checkoutdate"]."','".$_GET["advanceamount"]."','".$_GET["discount"]."')";

if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>