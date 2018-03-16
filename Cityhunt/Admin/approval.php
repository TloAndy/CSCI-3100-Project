<head>
<meta charset="UTF-8">
<title>核對任務記錄</title>
</head>
<?php
include 'DatabaseConnection.php';
$pw = '$2y$10$fX73GsaXbm9Lr0KHjSUChOAlIzndHRXK4sFKCVDQHbu6zEEk.0D3u';
?>
<input type="button" onclick="location.href='../MainPage.html';" value="回到用家目錄" />
<h2>City Hunt 記錄認證表</h2>

<?php

//Users not yet input
if (!$_POST)
{?>

<form action="" method="POST">
<table>
<tr><td>ID</td><td><input type = "text" id = "ID" name = "ID" required></td></tr>
<tr><td>PW</td><td><input type = "password" id = "PW" name = "PW" required></td></tr>
<tr><td>mode</td><td><select name = "mode"><option value = "approval">approval</option><option value = "all">view all records</option></select>
<tr><td colspan = "2" align = "right"><input type = "submit" value = "登入" name = "verification"></tr>
</table>
</form>
<?php 
}

//Not verified
else if (($_POST['ID'] != "admin" || !password_verify($_POST['PW'], $pw)) && isset($_POST['verification']))
{
	$message = "Wrong PW";
	echo "<script type='text/javascript'>alert('$message');</script>";	
	echo "<script type='text/javascript'> window.location.replace(\"approval.php\");</script>";	
}

//Users input right
else if ($_POST['ID'] == "admin" && password_verify($_POST['PW'], $pw) && $_POST['mode']=="approval")
{
	$sql = "SELECT approval.ID,approval.group AS '大組',approval.name AS '細組',mission.details AS '任務資料',approval.FinishedTime AS '完成時間',approval.status AS '狀態',approval.MissionPath AS '證明' FROM approval
	INNER JOIN mission
	ON mission.ID = approval.missionID 
	WHERE approval.status = 0 AND approval.ApprovedTime IS NULL
	ORDER BY approval.FinishedTime";
	$result = mysqli_query($db,$sql) or die("Query Failed!");
	?>
	<h4>未審核表</h4>
	<form action="" method="POST">
	<table border="1">
	<tr><td style="background-color: yellow; font-weight: bold">
	<?php
		for ($i = 1; $i < mysqli_num_fields($result); $i++)  {
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
			echo "<td><button name=\"Approve\" type=\"submit\" value=\"".$row_array[0]."\">Approve</button>
			<button name=\"Deny\" type=\"submit\" value=\"".$row_array[0]."\">Not Approve</button></td>";
			for ($j=1; $j < mysqli_num_fields($result); $j++) {
				if ($j == 6) { echo "<td><a href = \"".$row_array[$j]."\" target=\"_blank\">證明</a></td>\n"; }
				else  echo "<td>".$row_array[$j]."</td>\n"; 
			}
			echo "</tr>";
		}
		
		mysqli_free_result($result);
	?>
	</table>
	<?php
	echo "<input type = \"hidden\" id = \"ID\" name = \"ID\" value = \"".$_POST['ID'] ."\">";
	echo "<input type = \"hidden\" id = \"password\" name = \"PW\" value = \"".$_POST['PW']."\">";
	echo "<input type = \"hidden\" id = \"mode\" name = \"mode\" value = \"".$_POST['mode']."\">";
	echo "<br><button name=\"mode\" type=\"submit\" value=\"approval\">Refresh page</button><button name=\"mode\" type=\"submit\" value=\"all\">Change mode</button>";
	?>
	</form>
<?php
}

//View all records
else if ($_POST['ID'] == "admin" && password_verify($_POST['PW'], $pw) && $_POST['mode']=="all")
{
	$sql = "SELECT approval.ID,approval.group AS '大組',approval.name AS '細組',concat(mission.place,' ',mission.details) AS '任務資料',approval.FinishedTime AS '完成時間',approval.ApprovedTime AS '檢閱時間',approval.status AS '狀態' FROM approval
	INNER JOIN mission
	ON mission.ID = approval.missionID 
	WHERE approval.status = '1'";
	$result = mysqli_query($db,$sql) or die("Query Failed!");
?>
	<h4>已完成</h4>
	<table border="1">
	<tr>
	<?php
		for ($i = 1; $i < mysqli_num_fields($result); $i++)  {
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
			for ($j=1; $j < mysqli_num_fields($result); $j++) {
				echo "<td>".$row_array[$j]."</td>\n"; 
			}
			echo "</tr>";
		}
		
		mysqli_free_result($result);
	?>
	</table>
	
	<?php
	$sql = "SELECT approval.ID,approval.group AS '大組',approval.name AS '細組',concat(mission.place,' ',mission.details) AS '任務資料',approval.FinishedTime AS '完成時間',approval.ApprovedTime AS '檢閱時間',approval.status AS '狀態'FROM approval
	INNER JOIN mission
	ON mission.ID = approval.missionID 
	WHERE approval.status = '0' AND approval.ApprovedTime IS NOT NULL";
	$result = mysqli_query($db,$sql) or die("Query Failed!");
	?>
	
	<h4>未能完成</h4>
	<table border="1">
	<tr>
	<?php
		for ($i = 1; $i < mysqli_num_fields($result); $i++)  {
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
			for ($j=1; $j < mysqli_num_fields($result); $j++) {
				echo "<td>".$row_array[$j]."</td>\n"; 
			}
			echo "</tr>";
		}
		
		mysqli_free_result($result);
	?>
	</table>
	
	<?php
	echo "<form method = \"POST\" action = \"\">";
	echo "<input type = \"hidden\" id = \"ID\" name = \"ID\" value = \"".$_POST['ID'] ."\">";
	echo "<input type = \"hidden\" id = \"password\" name = \"PW\" value = \"".$_POST['PW']."\">";
	echo "<br><button name=\"mode\" type=\"submit\" value=\"approval\">Change mode</button><input type=\"button\" onclick=\"location.href='mission.php';\" value=\"更改任務列表\" ><input type=\"button\" onclick=\"location.href='team.php';\" value=\"更改大細組名\" >";
	echo "</form>";
	?>

<?php
}

if (isset($_POST['Approve']))
{
	$sql = "SELECT mission.type FROM approval INNER JOIN mission ON approval.missionID = mission.ID WHERE approval.ID = '".$_POST['Approve']."'";
	$result = mysqli_query($db,$sql) or die("Cannot found according mission");
	$row_array = mysqli_fetch_row($result);
	//主要任務加分
	if ($row_array[0] == "主要任務")
	{
		$sql = "SELECT team.ID, team.score ,approval.group,approval.missionID, approval.name FROM approval INNER JOIN team ON approval.name = team.name WHERE approval.ID = '".$_POST['Approve']."'";
		$result = mysqli_query($db,$sql) or die("Cannot found according mission");
		$row_array = mysqli_fetch_row($result);
		$sql = "UPDATE team SET score = $row_array[1]+200 WHERE team.ID = $row_array[0]";
		$score = $row_array[1];
		$ID = $row_array[0];
		$mission = $row_array[3];
		$group = $row_array[2];
		$name = $row_array[4];
		$result = mysqli_query($db,$sql) or die("Cannot add score");
		$sql = "SELECT * FROM approval WHERE `status` = '1' AND `missionID` = '$mission' AND `group` = '$group'";
		$result = mysqli_query($db,$sql) or die("Cannot find same result");
		if (mysqli_num_rows($result)>0)
		{
			$sql = "UPDATE team SET score = $score+100 WHERE team.ID = $ID";
			mysqli_query($db,$sql) or die("Cannot deduct duplicate score");
		}
		$sql = "SELECT * FROM approval WHERE `status` = '1' AND `missionID` = '$mission' AND `group` = '$group' AND `name` = '$name'";
		$result = mysqli_query($db,$sql) or die("Cannot find same result");
		if (mysqli_num_rows($result)>0)
		{
			$sql = "UPDATE team SET score = $score WHERE team.ID = $ID";
			mysqli_query($db,$sql) or die("Cannot deduct duplicate score");
		}
		
	}
	else //其他任務加分
	{
		$sql = "SELECT team.ID, team.score ,approval.group,approval.missionID, approval.name FROM approval INNER JOIN team ON approval.name = team.name WHERE approval.ID = '".$_POST['Approve']."'";
		$result = mysqli_query($db,$sql) or die("Cannot found according mission");
		$row_array = mysqli_fetch_row($result);
		$sql = "UPDATE team SET score = $row_array[1]+500 WHERE team.ID = $row_array[0]";
		$score = $row_array[1];
		$ID = $row_array[0];
		$mission = $row_array[3];
		$group = $row_array[2];
		$name = $row_array[4];
		$result = mysqli_query($db,$sql) or die("Cannot add score");
		$sql = "SELECT * FROM approval WHERE `status` = '1' AND `missionID` = '$mission' AND `group` = '$group' AND `name` = '$name'";
		$result = mysqli_query($db,$sql) or die("Cannot find same result");
		if (mysqli_num_rows($result)>0)
		{
			$sql = "UPDATE team SET score = $score WHERE team.ID = $ID";
			mysqli_query($db,$sql) or die("Cannot deduct duplicate score");
		}
	}
	$sql = "UPDATE `approval` SET `ApprovedTime` = NOW(), `status` = 1 WHERE `ID` = ".$_POST['Approve']."";
	mysqli_query($db,$sql) or die("Approve failed");
	$message = "Approved";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<form method = \"POST\" id = \"validated\"><input type = \"hidden\" id = \"ID\" name = \"ID\" value = \"".$_POST['ID']."\">";
	echo "<input type = \"hidden\" id = \"mode\" name = \"mode\" value = \"".$_POST['mode']."\">";
	echo "<input type = \"hidden\" id = \"PW\" name = \"PW\" value = \"".$_POST['PW']."\"></form>";
	echo "<script type='text/javascript'>document.getElementById('validated').submit();</script>";
}

if (isset($_POST['Deny']))
{
	$sql = "UPDATE `approval` SET `ApprovedTime` = NOW() WHERE `ID` = ".$_POST['Deny']."";
	mysqli_query($db,$sql) or die("Deny failed");
	$message = "Denied";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<form method = \"POST\" id = \"validated\"><input type = \"hidden\" id = \"ID\" name = \"ID\" value = \"".$_POST['ID']."\">";
	echo "<input type = \"hidden\" id = \"mode\" name = \"mode\" value = \"".$_POST['mode']."\">";
	echo "<input type = \"hidden\" id = \"PW\" name = \"PW\" value = \"".$_POST['PW']."\"></form>";
	echo "<script type='text/javascript'>document.getElementById('validated').submit();</script>";
}
?>

