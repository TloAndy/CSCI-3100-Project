<?php include 'Course_DatabaseConnection.php';?>
<html>
<head>
<h2>View course</h2>
</head>
<body>
<input type="button" onclick="location.href='CreateCourse.php';" value="Create Course" ><br>
<?php
	$result = mysqli_query($db,"SELECT course_title,course_code,enrolled_num, max_enrolled_num FROM `course_list`") or die("failed");
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
		echo "<td>
		<form method = \"POST\"><button name = \"delete\" value = \"".$row_array[1]."\" type=\"submit\">Delete course</button></form>
		<form method = \"POST\" action = \"EnrolledList.php\"><button name = \"View\" value = \"".$row_array[1]."\" type=\"submit\">View enrolled list</button></form></td>";
		for ($j=0; $j < mysqli_num_fields($result); $j++) 
		{
			echo "<td>".$row_array[$j]."</td>\n";  
		}
		echo "</tr>";
	}
?>

<?php
if (isset($_POST['delete']))
{
	$sql = "DROP TABLE ".$_POST['delete']."_info;";
	mysqli_query($db,$sql) or die("Delete enrolled info failed");
	$sql = "DROP TABLE ".$_POST['delete']."_material;";
	mysqli_query($db,$sql) or die("Delete material table failed");
	$sql = "DELETE FROM `course_list` WHERE `course_code` = '".$_POST['delete']."';";
	mysqli_query($db,$sql) or die("Delete failed");
	//Also need to update the user enrolled info
	
	//Also need to update the user enrolled info
	$message = "Delete Successfully";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header("Refresh:0");
}
?>
</body>
</html>