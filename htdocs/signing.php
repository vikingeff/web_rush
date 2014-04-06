<?php
	session_start();
	function exit_ret($con, $ret)
	{
		mysqli_close($con);
		if ($ret === -1)
			return (FALSE);
		else
			return (TRUE);
	}
	function auth($login, $passwd)
	{
		if (!isset($passwd) && !isset($login))
		{
			header("Location: signing.html");
			exit("ERROR\n");
		}
		include ("modif.php");
		$request = "select login_utilisateur, password_utilisateur from client where login_utilisateur = \"$login\"";
		$res = mysqli_query($con,$request);
		$row = mysqli_fetch_array($res);
		$ret = 1;
		if ($row['login_utilisateur'] !== $login)
			return (exit_ret($con, -1));
		$passwd = hash("whirlpool", $passwd);
		if ($row['password_utilisateur'] !== $passwd)
			$ret = -1;
		return (exit_ret($con, $ret));
	}
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	if (auth($login, $passwd) !== TRUE)
	{
		$_SESSION['loggued_on_user'] = "";
		header("Location: signing.html");
		exit("ERROR\n");
	}
	else
	{
		$_SESSION['loggued_on_user'] = $login;
		header("Location: index.php");
		exit("OK\n");
	}
?>