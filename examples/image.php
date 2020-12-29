<html>
    <body>
<form  name="form1" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>select file</td>
            <td><input type="file" name="f1"></td>
                    </tr>
        <tr>
        <td><input type="submit" name="submit1" value="upload"></td>
            <td><input type="submit" name="submit2" value="display"></td>
        </tr>
    </table>
   </form>
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

        if(isset($_POST['submit1']))
        {
               $image= addslashes(file_get_contents($_FILES['f1']['tmp_name']));
                mysqli_query($dbc,"INSERT INTO `image`(photo) VALUES ('$image')");
        }
        if(isset($_POST['submit2']))
        {
            $sql=mysqli_query($dbc,"SELECT * FROM `image`");
            echo "<table>";
        echo "<tr>";
            while($row=mysqli_fetch_array($sql))
        {
            echo "<td>";
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'" height="100" width="100"/>';
                echo "</td>";
        }
        echo "</tr>";
        echo "</table>";
        }
        ?>
        </body>
</html>
