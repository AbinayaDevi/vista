<?php
    
    $img = $_POST['image'];
    $uname = $_POST['name'];
    $folderPath = "uploads";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $uname. '.jpg';
  
    $file = $fileName;
    file_put_contents($file, $image_base64);
  
    print_r($fileName);
    echo " is inserted into database";
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
    
    if(isset($_POST['register'])){
       $sql=$dbcon->prepare("INSERT INTO `image`( `name`, `photo`) VALUES ('$uname','$file')");
      $auth=$sql->execute();
    }
  
?>