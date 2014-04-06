<?php
	include ("modif.php");
	$request = "select login_utilisateur from client where login_utilisateur = \"$login\"";
	$res = mysqli_query($con,$request);
	$row = mysqli_fetch_array($res);
	if ($row)
		$loginErr = "Login already used";
	mysqli_close($con);
?>