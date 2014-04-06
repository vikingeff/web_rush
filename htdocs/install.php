<?php
if (isset($_POST['id']) && isset($_POST['passwd']))
{
 $id = $_POST['id'];
 $mp = $_POST['passwd'];
 $mysqli = mysqli_connect("localhost:3306", $id, $mp);
 if (mysqli_connect_errno($mysqli))  
 {
   echo "Error: Connection fail (MySQL) : " . mysqli_connect_error();
   exit ;
 }
 else
  echo "Connection granted!"."\n";
 
 $query = file_get_contents("base.sql");
 if (mysqli_multi_query($mysqli, $query))
     echo "Base successfully created !";
  else 
     echo "Fail";
   $request = "GRANT SELECT ON rush.* TO invite@'localhost' IDENTIFIED BY 'invite'";
 mysqli_query($mysqli, $request);
 $request = "GRANT SELECT, INSERT, UPDATE ON rush.* TO creator@'localhost' IDENTIFIED BY 'Cr3at0r'";
 mysqli_query($mysqli, $request);
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>42 - Lingerie - Install</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
  <center>
    <a href="index.php"><img src="img/logo.png" alt="logo"></a>
  </center>
  <form method="post">
     <table>
       <tr><td>ID</td><td><input type="id" name="id"></td></tr>
       <tr><td>Password</td><td><input type="passwd" name="passwd"></td></tr>
       <tr><td></td><td><input type="submit" value="OK"></td></tr>
     </table>
   </form>
<hr width=100%>
<font face="monospace"><i><p align=right>© gleger - pcotasso 2014</p></i></fontface="monospace">
</body>
</html>