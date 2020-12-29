

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
$getjson = mysqli_query($dbc, "SELECT SUM(roomrent) as rent FROM adduser ");
$rows = mysqli_fetch_assoc($getjson);
$val =json_encode(array($rows));
echo $val;
?>
          
          