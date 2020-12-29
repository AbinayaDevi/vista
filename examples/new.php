<?php
include 'db_details.php';

 date_default_timezone_set("Asia/Kolkata");
$dbc = mysqli_connect($host, $username, $password, $database);
if (!$dbc) {
    die("Database connection failed: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, $database);
if (!$dbs) {
    die("Database selection failed: " . mysqli_error($dbc));
    exit(); 
}


$values = mysqli_query($dbc, "SELECT MAX(cur_time) FROM `adduser`");
$yourArray = array(); // make a new array to hold all your data
$index = 0;
while($row = mysqli_fetch_assoc($values)){ // loop to store the data in an associative array.
     $yourArray[$index] = $row;
     $index++;
}


$date1= ''.$yourArray[0]['MAX(cur_time)'].'';
//echo ''.$date1.'';
function diff($date1)
{
    $date2 =strtotime( date('Y-m-d H:i:s'));
    //echo ''.$date2.'';
    $interval=$date2-strtotime($date1);
   // echo $interval;die;
if($interval<60)
{
    return round($interval)." sec ago";
}
else if($interval>=60 && $interval<3600)
{
    return round($interval/60). "mins ago";
}
else if($interval>=3600 && $interval<86400)
{
    return round($interval/3600). "hrs ago";
}
else if($interval>=86400 && $interval<(86400*30))
{
    return round($interval/86400). "days ago";
}
else if($interval>=(86400*30) && $interval<(86400*365))
{
    return round($interval/(86400*30)). "yrs ago";
}
else
{
    return round($interval/(86400*365)). "yrs ago";
}
}
//echo '<p>current time is:'.date('Y-m-d H:i:s').'</p>';
//echo '<p>'.$date1.'</p>';
echo '<p>'.diff($date1).'</p>';
?>