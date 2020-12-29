<?php

include 'db_details.php';
 
$dbc = mysqli_connect($host,$username,$password,$database);
if (!$dbc) {
    die("Database connection failed: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, $database);
if (!$dbs) {
    die("Database selection failed: " . mysqli_error($dbc));
    exit();     
}
$getjson = mysqli_query($dbc, "SELECT * FROM `adduser` WHERE checkoutdate>CURRENT_DATE");
$rows=mysqli_num_rows($getjson);
//while($r = mysqli_fetch_assoc($getjson)){
//    $rows= $r;
//}
//$val1 =$rows;
//$r1 = $val1;

// echo $val1;

// echo json_encode(array(
//     'user'=>$arrayFetch,
//     'count'=>$count,
// ));
$val =json_encode(array($rows));
echo $val;
?>
          
          