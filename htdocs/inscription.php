<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<?php
	session_start();
	// define variables and set to empty values
	$nom = $prenom = $login = $passwd = $passwd2 = $email = $adresse = $phone = "";
	$nameErr = $emailErr = $passwdErr = $passwd2Err = $loginErr = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["nom"]))
			$nameErr = "Name is required";
		else
		{
			$nom = test_input($_POST["nom"]);
			if (!preg_match("/^[a-zA-Z \-]*$/",$nom))
				$nameErr = "Only letters, white space and - are allowed";
		}					
		$prenom = test_input($_POST["prenom"]);
		if (empty($_POST["login"]))
		{
			$loginErr = "If you don't specify a login your mail will be used";
			if (!empty($_POST["email"]))
				$login = $email;
		}
		else
		{
			$login = test_input($_POST["login"]);
			$_SESSION['login'] = $login;
			include ("test.php");
		}
		if (empty($_POST["passwd"]))
			$passwdErr = "You must specify a password";
		else if (empty($_POST["passwd"]))
			$passwd2Err = "Passwords don't match";
		else
		{
			$passwd = test_input($_POST["passwd"]);
			$passwd2 = test_input($_POST["passwd2"]);
			if (strcmp($passwd, $passwd2) !== 0)
				$passwd2Err = "Passwords don't match";
			else
			{
				$passwd = hash("whirlpool", test_input($_POST["passwd"]));
				$passwd2 = hash("whirlpool", test_input($_POST["passwd2"]));
			}
			if (!preg_match("/^[a-zA-Z0-9]*$/",$passwd))
				$passwdErr = "Password can only contain letters and number, yes i know life sucks";
		}
		if (empty($_POST["email"]))
			$emailErr = "E-mail is required";
		else
		{
			$email = test_input($_POST["email"]);
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
				$emailErr = "Invalid email format";
		}
		$adresse = test_input($_POST["adresse"]);
		$phone = test_input($_POST["phone"]);
		if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($passwdErr) && empty($passwd2Err) && empty($loginErr))
		{
			include ("modif.php");
			include ("validation.php");
			mysqli_close($con);
			echo "account created"."\n";
			header("location:account_ok.php");
			exit();
		}
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 		<title>42 - Lingerie</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body bgcolor="#FFFFFF">
		<center>
			<img src="img/logo.png" alt="logo">
		</center>
		<h2>Formulaire d'inscription</h2>
		<p><span class="error">* required field.</span></p>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label>Nom: </label><input type="text" name="nom" value="<?php echo $nom;?>"/>
				<span class="error">* <?php echo $nameErr;?></span>
			<label>Prénom: </label><input type="text" name="prenom"value="<?php echo $prenom;?>"/>
			<label>Login: </label><input type="text" name="login"value="<?php echo $login;?>"/>
				<span class="error">* <?php echo $loginErr;?></span>
			<label>Password: </label><input type="password" name="passwd" value="<?php echo $passwd;?>"/>
				<span class="error">* <?php echo $passwdErr;?></span>
			<label>Confirm password: </label><input type="password" name="passwd2" value="<?php echo $passwd2;?>"/>
				<span class="error">* <?php echo $passwd2Err;?></span>
			<label>E-mail: </label><input type="text" name="email" value="<?php echo $email;?>"/>
				<span class="error">* <?php echo $emailErr;?></span>
			<label>Adresse: </label><input type="text" name="adresse"/><br/>
			<label>Telephone: </label><input type="text" name="phone"/><br/>
			<input type="submit" value="M'inscrire"/>
		</form>
		<hr width=100%>
		<font face="monospace"><i><p align=right>© gleger - pcotasso 2014</p></i></fontface="monospace">
	</body>
</html>