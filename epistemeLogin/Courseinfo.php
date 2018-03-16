<html>
<head>
<h2>Create new course</h2>
<script>
function validateForm() {
	//Check course title
	var x = document.forms["createCourse"]["course_title"].value;
	if (x == "") {
        alert("Course title must be filled out");
        return false;
    }
	//End Check course title
	
	//Check course code
    var x = document.forms["createCourse"]["course_code"].value;
    if (x.length != 8)
	{
		alert("Wrong Course Code length");
        return false;
    }
	x = x.toUpperCase();
	var CourseIDPat = /^([A-Z]{4})([0-9]{4})$/;
	if (x.match(CourseIDPat) == null)
	{
		alert("Wrong Course Code format");
		return false;
	}
	//End check course code
	
	//Check Maximum enrollment number
	var x = document.forms["createCourse"]["max_enroll_num"].value;
	if (isNaN(x) == true)
	{
		alert("Maximum enrollment number must be an integer");
		return false;
	}
	//End check Maximum enrollment number
	
	//Check course password
	 var x = document.forms["createCourse"]["course_pw"].value;
    if (x.length != 6)
	{
		alert("Wrong password length, 6 characters is required");
        return false;
    }
	//End check course password
}
</script>
</head>
<body>
<!--Create new course table -->
<form name = "createCourse"action = "" method = "POST" onsubmit="return validateForm()" name = "input">
<table border = "2">
<tr><td>Course Title</td><td><input type = "text" name="course_title" id = "course_title"></td></tr>
<tr><td>Course Code (XXXX0000)</td><td><input type = "text" name="course_code" id = "course_code"></td></tr>
<tr><td>Maximum enrollment number</td><td><input type = "text" name="max_enroll_num" id = "max_enroll_num"></td></tr>
<tr><td>Course password</td><td><input type = "password" name="course_pw" id = "course_pw"></td></tr>
<tr><td colspan = "2"><input type = "submit" name = "create" value = "Submit"></td></tr>
</table>
<!--Create new course table -->
<?php
if($_POST)
{
	echo "Course \"".$_POST['course_code']." ".$_POST['course_title']."\" has successfully created<br>";
	echo "Accessed with:".$_POST['course_pw'];
}
?>
</form>
</body>
</html>