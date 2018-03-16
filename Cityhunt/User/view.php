<head>
<meta charset="UTF-8">
<title>任務核對狀況</title>
</head>
<input type="button" onclick="location.href='../MainPage.html';" value="回到主目錄" />
<h2>查看任務狀況</h2>
<?php include 'DatabaseConnection.php';
if (!isset($_POST['filter']))
{
?>
<form action = "" method = "POST" >
<table>
<!-- Filter record -->
<tr><td>請選擇你的組別: </td>
<td> 
<?php 
$result = mysqli_query($db,"SELECT `group`,`name` FROM `team`") or die("failed"); 
echo "<select name = \"group\" id = \"group\" required>";
for ($i = 0; $i < mysqli_num_rows($result); $i++)  
{
	$row_array = mysqli_fetch_row($result);
	echo "<option>";
	for ($j=0; $j < mysqli_num_fields($result); $j++) {
		if ($j != 0) echo ":";
		echo $row_array[$j];  
	}
	echo "</option>\n";
	
}
echo "</select>";
?>
</td></tr>
<tr><td colspan = "2"><input type = "submit" name = "filter" value = "檢視"><td></tr></table></form>
<!-- End form of filter record -->
<?php
}


//---------View records-------
else
{
		$tmp = $_POST['group'];
		$name = explode( ':', $tmp );
		echo "<h3>大組:".$name[0]."  細組:".$name[1]."</h3>";
		$sql = "SELECT approval.missionID AS '任務編號',mission.place AS '任務資料',approval.FinishedTime AS '完成時間',approval.ApprovedTime AS '檢閱時間',approval.status AS '狀態(0=未通過,1=已完成)'FROM approval
		INNER JOIN mission
		ON mission.ID = approval.missionID 
		WHERE approval.group = '".$name[0]."' AND approval.name = '".$name[1]."' AND approval.status = 1 ORDER BY approval.FinishedTime desc";
		$result = mysqli_query($db,$sql) or die("Query Failed!");
	?>
	<h4>已完成</h4>
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
	<?php
	$sql = "SELECT approval.missionID AS '任務編號',mission.place AS '任務資料',approval.FinishedTime AS '完成時間',approval.ApprovedTime AS '檢閱時間',approval.status AS '狀態(0=未通過,1=已完成)'FROM approval
	INNER JOIN mission
	ON mission.ID = approval.missionID 
	WHERE approval.group = '".$name[0]."' AND approval.name = '".$name[1]."' AND approval.status = 0 AND approval.ApprovedTime IS NOT NULL ORDER BY approval.FinishedTime desc";
	$result = mysqli_query($db,$sql) or die("Query Failed!");
	?>
	<h4>未能完成</h4>
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
	
	<?php
	$sql = "SELECT approval.missionID AS '任務編號',mission.place AS '任務資料',approval.FinishedTime AS '完成時間',approval.ApprovedTime AS '檢閱時間',approval.status AS '狀態(0=未通過,1=已完成)'FROM approval
	INNER JOIN mission
	ON mission.ID = approval.missionID 
	WHERE approval.group = '".$name[0]."' AND approval.name = '".$name[1]."' AND approval.status = 0 AND approval.ApprovedTime IS NULL ORDER BY approval.FinishedTime desc";
	$result = mysqli_query($db,$sql) or die("Query Failed!");
	?>
	<h4>未審核</h4>
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
	<?php
		mysqli_free_result($result);
		mysqli_close($db);
	?>
	</table>
	<?php
}
?>