<head>
<meta charset="UTF-8">
<title>各組成績分怖</title>
</head>
<input type="button" onclick="location.href='../MainPage.html';" value="回到主目錄" />
<h2>成績表</h2>
<?php include 'DatabaseConnection.php';
$sql = "SELECT `group` AS '大組',SUM(`score`) AS '總成績' FROM `team` GROUP BY `group`" ;
$result = mysqli_query($db,$sql) or die("Query Failed!");
?>
<h4>各大組總成績</h4>
<table border="1">
<tr>
<?php
	for ($i = 0; $i < mysqli_num_fields($result); $i++)  {
		$finfo = mysqli_fetch_field_direct($result, $i);
		echo "<td style=\"background-color: yellow; font-weight: bold\">".
			  $finfo->name."</td>";  
	}
	echo "\n";
?>
</tr>
<?php
	for ($i = 0; $i < mysqli_num_rows($result); $i++)  {
		echo "<tr>";
		$row_array = mysqli_fetch_row($result);
		for ($j=0; $j < mysqli_num_fields($result); $j++) {
			echo "<td>".$row_array[$j]."</td>\n"; 
		}
		echo "</tr>";
	}
		?>
</table>
<button onclick = "showMore()">找戰犯</button>
<script>
function showMore()
{
	var x = document.getElementById('more');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>
<div id = "more" style = "display: none;"><h4>檢視各細組成績</h4>
<form action = "" method = "POST" >
<table>
<!-- Filter record -->
<tr><td>請選擇大組: </td>
<td> 
<?php 
$result = mysqli_query($db,"SELECT `group` FROM `team` GROUP BY `group`") or die("failed"); 
echo "<select name = \"group\" id = \"group\" required><option>**請選擇**</option>";
for ($i = 0; $i < mysqli_num_rows($result); $i++)  
{
	$row_array = mysqli_fetch_row($result);
	echo "<option>";
	for ($j=0; $j < mysqli_num_fields($result); $j++) {
		echo $row_array[$j];  
	}
	echo "</option>\n";
	
}
echo "</select>";
?>
</td></tr>
<tr><td colspan = "2"><input type = "submit" name = "filter" value = "檢視"><td></tr></table></form></div>

<?php
if (isset($_POST['filter']))
{
	if ($_POST['group'] != "**請選擇**")
	{
	$sql = "SELECT `name` AS '細組', `score` AS '成績' FROM `team` WHERE `group` = '".$_POST['group']."' " ;
	$result = mysqli_query($db,$sql) or die("Query Failed!");
?>
<?php echo "<h4>".$_POST['group']."各細組成績</h4>"?>
<table border="1">
<tr>
<?php
	for ($i = 0; $i < mysqli_num_fields($result); $i++)  {
		$finfo = mysqli_fetch_field_direct($result, $i);
		echo "<td style=\"background-color: yellow; font-weight: bold\">".
			  $finfo->name."</td>";  
	}
	echo "\n";
?>
</tr>
<?php
	for ($i = 0; $i < mysqli_num_rows($result); $i++)  {
		echo "<tr>";
		$row_array = mysqli_fetch_row($result);
		for ($j=0; $j < mysqli_num_fields($result); $j++) {
			echo "<td>".$row_array[$j]."</td>\n"; 
		}
		echo "</tr>";
	}
	echo "</table>";
	}
	else
	{
		$message = "請選擇大組!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
		?>

