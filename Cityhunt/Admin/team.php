<head>
  <meta charset="UTF-8">
  <title>修改隊伍名單</title>
</head>
<input type="button" onclick="location.href='approval.php';" value="回到admin page" >
<h2>在更改任何隊伍名前需要重設所有提交任務, city hunt進行時不能進行任何更改</h2>
<?php
	include 'DatabaseConnection.php';
	// Main page
	$result = mysqli_query($db,"SELECT * FROM `team`") or die("failed");
	echo "<table border=\"1\"><tr><td></td>";
	for ($i = 1; $i < mysqli_num_fields($result); $i++)  
	{
		$finfo = mysqli_fetch_field_direct($result, $i);
		echo "<td>".$finfo->name."</td>";
	}
	echo "</tr>";
	for ($i = 0; $i < mysqli_num_rows($result); $i++)  {
		echo "<tr>";
		$row_array = mysqli_fetch_row($result);
		echo "<td><form method = \"POST\"><button name = \"delete\" value = \"".$row_array[0]."\" type=\"submit\">Delete</button></form></td>";
		for ($j=1; $j < mysqli_num_fields($result); $j++) {
			echo "<td>".$row_array[$j]."</td>\n";  
		}
		echo "</tr>";
	}
	echo "<form action = \"\" method = \"POST\" ><tr><td></td>";
	for ($i = 1; $i < mysqli_num_fields($result); $i++)  
	{
		$finfo = mysqli_fetch_field_direct($result, $i);
		echo "<td><input type = \"text\" name = \"".$finfo->name."\"";
		echo "></td>";
	}
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan = \"8\" align = \"right\"><input type = \"submit\" name = \"reset\" value = \"reset\"><input type = \"submit\" name = \"add\" value = \"new\"></td>";
	echo "</tr></form>";
	// Main page end
	
	if (isset ($_POST['add']))
	{
		$sql = "INSERT INTO `team` (`name`, `group`) 
		VALUES ('".$_POST['name']."','".$_POST['group']."')";
		mysqli_query($db,$sql) or die("Add failed");
		$message = "Add Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh:0");
	}
	
	if (isset($_POST['delete']))
	{
		$sql = "DELETE FROM team WHERE ID = '".$_POST['delete']."';";
		mysqli_query($db,$sql) or die("Delete failed");
		$message = "Delete Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh:0");
	}
	if (isset($_POST['reset']))
	{
		$sql = "UPDATE team SET score = 0";
		mysqli_query($db,$sql) or die("Reset failed");
		$message = "Reset Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh:0");
	}
	mysqli_free_result($result);
	mysqli_close($db);
	?>