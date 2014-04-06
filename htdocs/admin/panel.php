<center><h1>Interface admin</h1></center>
<form action="./panel.php">
<input type="hidden" name="display" value="user">
<input type="submit" value="Show users">
</form>
<?php
include("../page/modif.php");
if (isset($_POST['type']) && isset($_POST['action']))
{
	if ($_POST['type'] == 'user' && $_POST['action'] == 'del')
	{
		$j = 0;
		while($j < $_POST['max'])
		{
			if (isset($_POST["rem".$j]))
			{
				$request = "delete from client where login_utilisateur = \"".$_POST["rem".$j]."\"";
				mysqli_query($con, $request);
			}
			$j++;
		}
	}
}
if (isset($_GET['display']))
{
	if ($_GET['display'] == 'user')
	{
		$request = "select login_utilisateur from client";
		$res = mysqli_query($con, $request);
		echo "<form action=\"./panel.php\" method=\"post\">";
		$i = 0;
		while (($row = mysqli_fetch_array($res)))
		{
			echo "<input type=\"checkbox\" name=\"rem".$i."\" value=\"".$row['login_utilisateur']."\">".$row['login_utilisateur']."<br>";
			$i++;
		}
		echo "<input type=\"hidden\" name=\"type\" value=\"user\">";
		echo "<input type=\"hidden\" name=\"action\" value=\"del\">";
		echo "<input type=\"hidden\" name=\"max\" value=\"".$i."\">";
		echo "<input type=\"submit\" value=\"Delete\">";
		echo "</form>";
		
	}
	else if ($_GET['display'] == 'cat')
	{

	}
}
?>