<?php
$dbname='dummy';
      $host='localhost';
      $username='root';
      $password='';
      try{
      $dbcon=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
       }
      catch(PDOException $vairu){
          echo $vairu->getMessage();
      }
    

if(isset($_GET['id']))
{
    $id=mysqli_real_escape_string($_GET['id']);
    $query=mysqli_query("SELECT * FROM `image` WHERE id=$id");
    while($row=mysqli_fetch_assoc($query))
    {
        $imageData=$row["image"];
    }
    header("content-type:image/jpg");
    echo $imageData;
}
else
{
    echo "error";
}
?>