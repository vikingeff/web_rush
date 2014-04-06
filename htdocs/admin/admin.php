<!DOCTYPE html>
<?php
session_start();
	if(isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] !== "" && $_SESSION['is_admin'] == true)
	{
		$page = "./panel.php";
	}
	else
	{
		echo "<center><h2><span class=\"error\">Trololol You're so not an admin.</span></h2></center>";
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Interface Admin</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body bgcolor="#FFFFFF">
	<?php
	if (isset($page))
	{
		include($page);
	}
	else
		echo "Access denied";
	?>

	<hr width=100%>
    <font face="monospace"><i><p align=right>© gleger - pcotasso 2014</p></i></fontface="monospace">
	</div>
	</body>
</html>