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

<link rel="stylesheet" href="../assets/css/button.css">

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

    </head>
</html>
<?php

//echo "<script type=text/javascript'>alert('1');</script>";
include 'db_details.php';
//echo "<script type='text/javascript'>alert('2');</script>";
$link = mysqli_connect($host, $username, $password, $database);
////$querye = "INSERT INTO `adduser` (country) VALUES ('$country')";
//$name=$_GET['name'];
//$roomno=$_GET['roomno'];
//$checkindate=$_GET['checkindate'];
//$checkoutdate=$_GET['checkoutdate'];
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$result = mysqli_query($link,"SELECT `id` , `name`, `roomno`, `checkindate`, `checkoutdate` FROM `adduser` ORDER BY id ASC ");
//$sql = "SELECT `name`, `roomno`, `checkindate`, `checkoutdate` FROM `adduser` ";
//$result = $link->query($sql);
$array = array();
if($result -> num_rows > 0 )
{
//echo "<script type='text/javascript'>alert('insideif');</script>";
echo "<br>";
echo "<center><table id=hotel border = 1 >
<tr>
<th>S No</th>
<th>Name</th>
<th>Room No</th>
<th>Check In Date</th>
<th>Check Out Date</th>
<th>Action</th>
</tr></center>";
while($row = mysqli_fetch_array($result))
{
    $array[] = $row;                //create array
    echo "<tr>";
    echo "<td id='guestid'>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['roomno'] . "</td>";
    echo "<td>" . $row['checkindate'] . "</td>";
    echo "<td>" . $row['checkoutdate'] . "</td>";
//    echo "<td>" . "<center><button class='btn' style='background-color: #800080;' >Edit</button><button class='btn' style='background-color: #800080;'>Check Out</button></center>" . "</td>";
//    echo "<script>function onc(){alert('hi');}</script>";
    echo "<td>" . "<center><input class='btn' type='button' id='editguesttable' value='Edit' onclick='editrow(this)' /><input class='btn' type='button' id='checkoutguesttable' value='Check Out' onclick='deleterow()' />" . "</td>";
    echo "</tr>";
//    echo "<script>alert('table');</script>";
//    echo '<script type="text/JavaScript">
//    prompt("hi");
//     prompt("GeeksForGeeks"); 
//     </script>' 
//;
}
    echo "</table>";
}
else
{
    echo "Zero Result";
}
function deleterow()
{
 echo "<script>alert('hii')</script>"   ;
for($i = 0 ; $i <count($array); $i++)
{
    
//    $deleterowquery = "DELETE `id` , `name`, `roomno`, `checkindate`, `checkoutdate` FROM `array()` WHERE 'id'=$row['id']";
    echo "<script>alert('hi')</script>";
//    $guesttable = document.getElementById('hotel');     guesttable.deleteRow(oButton.parentNode.parentNode.rowIndex);  
}
//deleterow();
}

mysqli_close($link);
?>
