<head>
<title>修改任務</title>
  <meta charset="UTF-8">
</head>
<?php
	include 'DatabaseConnection.php';
	// Main page
	?>
	<form method = "POST"><input type="button" onclick="location.href='approval.php';" value="回到admin page" ><input type = "submit" name = "reset" value = "重設所有已提交任務"></form>
	<h2>在更改任何任務前需要重設所有提交任務, city hunt進行時不能進行任何更改</h2>
	<?php
	$result = mysqli_query($db,"SELECT * FROM `mission` ORDER BY ID") or die("failed");
	echo "<table border=\"1\"><tr><td></td>";
	for ($i = 0; $i < mysqli_num_fields($result); $i++)  
	{
		$finfo = mysqli_fetch_field_direct($result, $i);
		echo "<td>".$finfo->name."</td>";
	}
	echo "</tr>";
	for ($i = 0; $i < mysqli_num_rows($result); $i++)  {
		echo "<tr>";
		$row_array = mysqli_fetch_row($result);
		echo "<td><form method = \"POST\"><button name = \"delete\" value = \"".$row_array[0]."\" type=\"submit\">Delete</button></form></td>";
		for ($j=0; $j < mysqli_num_fields($result); $j++) {
			echo "<td>".$row_array[$j]."</td>\n";  
		}
		echo "</tr>";
	}
	echo "<form action = \"\" method = \"POST\" ><tr><td></td>";
	for ($i = 0; $i < mysqli_num_fields($result); $i++)  
	{
		$finfo = mysqli_fetch_field_direct($result, $i);
		if ($i == 1)
		{
			echo 
			"<td><select name = \"district\" id = \"district\">
			<option selected disabled>**Please select**</option>
			<option disabled>香港</option>
			<option>中西區</option>
			<option>東區</option>
			<option>南區</option>
			<option>灣仔區</option>
			<option disabled>九龍</option>
			<option>九龍城區</option>
			<option>觀塘區</option>
			<option>深水埗區</option>
			<option>黃大仙區</option>
			<option>油尖旺區</option>
			<option disabled>新界</option>
			<option>離島區</option>
			<option>葵青區</option>
			<option>北區</option>
			<option>西貢區</option>
			<option>沙田區</option>
			<option>大埔區</option>
			<option>荃灣區</option>
			<option>屯門區</option>
			<option>元朗區</option>
			</select></td>";
		}
		else if ($i == 4)
		{
			echo 
			"<td><select name = \"type\" id = \"type\">
			<option>主要任務</option>
			<option>額外任務</option>
			</select>";
		}
		else
		{
		echo "<td><input type = \"text\" name = \"".$finfo->name."\"";
		}
		if ($i == 0) echo "required";
		echo "</td>";
	}
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan = \"8\" align = \"right\"><input type = \"submit\" name = \"reorder\" value = \"ID重新排序\"><input type = \"submit\" name = \"add\" value = \"新增\"></td>";
	echo "</tr></form>";
	// Main page end
	
	if (isset ($_POST['add']))
	{
		$sql = "INSERT INTO `mission` (`ID`, `district`, `place`, `details`,`type`) 
		VALUES ('".$_POST['ID']."','".$_POST['district']."','".$_POST['place']."', '".$_POST['details']."','".$_POST['type']."')";
		mysqli_query($db,$sql) or die("Add failed");
		$message = "Add Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh:0");
	}
	
	if (isset($_POST['delete']))
	{
		$sql = "DELETE FROM mission WHERE ID = '".$_POST['delete']."';";
		mysqli_query($db,$sql) or die("Delete failed");
		$message = "Delete Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh:0");
	}
	
	if (isset ($_POST['reset']))
	{
		$sql = "DELETE FROM approval WHERE 1;";
		mysqli_query($db,$sql) or die("Delete record failed");
		$sql = "ALTER TABLE `approval` AUTO_INCREMENT=1;";
		mysqli_query($db,$sql) or die("Reset failed");
		$sql = "UPDATE team SET score = 0";
		mysqli_query($db,$sql) or die("Reset team value failed");
		$message = "All task user submitted are deleted. Reset success";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh:0");
	}
	if (isset ($_POST['reorder']))
	{
		$sql = "SET @i=0;
				UPDATE mission SET ID=(@i:=@i+1);";
		mysqli_query($db,$sql) or die("Reorder failed");
		$message = "All task user submitted are deleted. Reset success";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh:0");
	}
	mysqli_free_result($result);
	mysqli_close($db);
	?>