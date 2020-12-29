<!DOCTYPE html>
<html>
       <head>
        
        <style>
#hotel {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
}

#hotel td, #hotel th {
  border: 1px solid #ddd;
  padding: 8px;
}



/*#hotel tr:hover {background-color: dimgray;width: 90%;}*/

#hotel th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: white;
/*  text-decoration-color: #FFA500;*/
  color: #FFA500;
    font-size: 20;
}
</style>
           <link rel="stylesheet" href="../assets/css/button.css">
</head>
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
$getjson = mysqli_query($dbc, "SELECT `id1` , `name`, `roomno`, `checkindate`, `checkoutdate` FROM `adduser` ORDER BY id1 ASC");
$rows=mysqli_num_rows($getjson);echo "<br>";
echo "<center><table id=hotel border = 1 >
<tr>
<th>S No</th> 
<th>Name</th>
<th>Room No</th>
<th>Check In Date</th>
<th>Check Out Date</th>
<th>Action</th>
</tr></center>";
while($r = mysqli_fetch_assoc($getjson)){
   $rows= $r;
    echo "<tr>";
    echo "<td id='guestid'>" . $r['id1'] . "</td>";
    echo "<td>" . $r['name'] . "</td>";
    echo "<td>" . $r['roomno'] . "</td>";
    echo "<td>" . $r['checkindate'] . "</td>";
    echo "<td>" . $r['checkoutdate'] . "</td>";
    echo "<td>" . "<center><input class='btn' type='button' id='editguesttable' value='Edit' onclick='editrow(this)' />&nbsp<input class='btn' type='button' id='checkoutguesttable' value='Check Out' onclick='deleterow()' />" . "</td>";
    echo "</tr>";

}
//$val1 =$rows;
//$r1 = $val1;

// echo $val1;

// echo json_encode(array(
//     'user'=>$arrayFetch,
//     'count'=>$count,
// ));
//$val =json_encode(array($rows));
//echo $val;
?>
</html>
