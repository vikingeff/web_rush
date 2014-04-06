<?php
	if (isset($_GET["famille"]))
	{
		//echo $_GET["famille"]."\n";
		$filter = $_GET["famille"];
		//echo $filter."\n";
		$request = "select id_famille from famille where nom_famille = \"$filter\"";
		//echo $request."\n";
		$res = mysqli_query($con,$request);
		$row = mysqli_fetch_array($res);
		if ($row)
			$filter = $row["id_famille"];
		//echo $filter."\n";
		$request = "select image_vetement, nom_vetement, prix_vetement, id_vetement from vetement where famille_vetement = $filter";
		//echo $request."\n";
		$result = mysqli_query($con,$request);

	}
	else
		$result = mysqli_query($con,"select distinct id_vetement, image_vetement, nom_vetement, prix_vetement from vetement");
	echo "<center>";
	$list_img="";
	$list_nom="";
	$list_prix="";
	$list_id="";
	$nb_boobs=0;
	while($row = mysqli_fetch_array($result))
	{
		$list_img[$nb_boobs]=$row['image_vetement'];
		$list_nom[$nb_boobs]=$row['nom_vetement'];
		$list_prix[$nb_boobs]=$row['prix_vetement'];		
		$list_id[$nb_boobs]=$row['id_vetement'];
		$nb_boobs++;
	}
	if (!isset($_GET["famille"]))
	{
		$numbers = range(0, $nb_boobs-1);
		shuffle($numbers);
		$nb_boobs = 4;
		echo "<form method='post' action='panier.php'>";
		while ($nb_boobs !== 0)
		{
			$id_to_sub = $list_id[$numbers[$nb_boobs]];
			echo "<button type='submit' border='0' name='button' value=".$id_to_sub."><img src=".$list_img[$numbers[$nb_boobs]]." width='313' height='370' id='".$id_to_sub."' align='middle' ></button>";
			echo $list_nom[$numbers[$nb_boobs]];
			echo $list_prix[$numbers[$nb_boobs]];
			$nb_boobs--;
		}
	}
	else
	{
		$nb_boobs--;
		echo "<form method='post' action='panier.php'>";
		while ($nb_boobs >= 0)
		{
			$id_to_sub = $list_id[$nb_boobs];
			echo "<button type='submit' border='0' name='button' value=".$id_to_sub."><img src=".$list_img[$nb_boobs]." width='313' height='370' id='".$id_to_sub."' align='middle' ></button>";
			echo $list_nom[$nb_boobs];
			echo $list_prix[$nb_boobs];
			$nb_boobs--;
		}
	}
	echo "</form>";
	echo "</center>";
	mysqli_close($con);
?>