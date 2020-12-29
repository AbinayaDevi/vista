

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
$getjson = mysqli_query($dbc, "SELECT count(*) as a  FROM adduser ORDER BY id1");
$rows = mysqli_num_rows($getjson);
while($r = mysqli_fetch_assoc($getjson)) {
    $rows= $r;
}
// echo $val1;

$getjson1 = mysqli_query($dbc, "SELECT count(*) as b FROM info ORDER BY id");
$rows1 = mysqli_num_rows($getjson1);
while($r1 = mysqli_fetch_assoc($getjson1)) {
  $rows1= $r1;
}
// echo json_encode(array(
//     'user'=>$arrayFetch,
//     'count'=>$count,
// ));
$val =json_encode(array($rows,$rows1));
echo $val;
?>
          
          