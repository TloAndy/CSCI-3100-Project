<?php include 'Course_DatabaseConnection.php';?>
<html>
<head>
</head>
<body>
<?php 
//CHOOSE CODE, TEMPOARY CODE
if (!$_POST)
{
?>
<h2>Add course material</h2>
<form method = "POST">
<?php
$result = mysqli_query($db,"SELECT `course_code`,`course_title` FROM `course_list`") or die("failed"); 
echo "<select name = \"course_code\" id = \"course_code\" required><option disabled selected>**Please select**</option>";
for ($i = 0; $i < mysqli_num_rows($result); $i++)  
{
	$row_array = mysqli_fetch_row($result);
	echo "<option value = \"".$row_array[0]."\">";
	for ($j=0; $j < mysqli_num_fields($result); $j++) {
		echo $row_array[$j]." ";  
	}
	echo "</option>\n";
	
}
echo "</select>";
?>
<br><input type = "submit" name = "choose" value = "choose">
</form>
<?php
}
//END OF CHOOOSE COURSE, TEMPOARY CODE
//ADD COURSE MATERIAL
else if (isset($_POST['choose'])&&isset($_POST['course_code']))
{
	echo "<h2>Add ".$_POST['course_code']." course material</h2>";
?>

<table  border = "2">
<tr><td>Name of the file</td><td><input type = "text" name="material_name" id = "material_name" maxlength="30"></td></tr>
<tr><td>Type</td><td><select>
<option value = "lecture notes">Lecture notes</option>
<option value = "tutorila notes">Tutorial notes</option>
<option value = "Assignment">Assignment</option>
<option>Others</option></select>
</td></tr>
<tr><td>File</td><td><input type="file" name = "file" id = "file" required></td></tr>
<tr><td colspan = "2"><input type = "submit" name = "add" value = "add"></td></tr>

</table>
<?php
}
//END OF ADD COURSE MATERIAL FORM
?>
</body>
</html>