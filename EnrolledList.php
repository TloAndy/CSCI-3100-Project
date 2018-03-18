<?php include 'Course_DatabaseConnection.php';?>
<html>
<head>
<h2>View Enrolled List</h2>
</head>
<body>
<input type="button" onclick="location.href='Courseinfo.php';" value="Back" ><br>
<?php
if (isset($_POST['View']))
{
	$result = mysqli_query($db,"SELECT * FROM `".$_POST['View']."_info`") or die("failed");
	echo "<table border=\"1\"><tr>";
	for ($i = 0; $i < mysqli_num_fields($result); $i++)  
	{
		$finfo = mysqli_fetch_field_direct($result, $i);
		echo "<td>".$finfo->name."</td>";
	}
	echo "</tr>";
	for ($i = 0; $i < mysqli_num_rows($result); $i++)  {
		echo "<tr>";
		$row_array = mysqli_fetch_row($result);
		for ($j=0; $j < mysqli_num_fields($result); $j++) 
		{
			echo "<td>".$row_array[$j]."</td>\n";  
		}
		echo "</tr>";
	}
}
?>