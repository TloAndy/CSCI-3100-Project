<head>
<meta charset="UTF-8">
<title>提交任務</title>
</head>
<?php include 'DatabaseConnection.php';?>
<input type="button" onclick="location.href='../MainPage.html';" value="回到主目錄" />
<form action = "" method = "POST" enctype = "multipart/form-data">
<table border = "2">

<tr><td>組別</td>
<td> <?php 
$result = mysqli_query($db,"SELECT `group`,`name` FROM `team`") or die("failed"); 
echo "<select name = \"group\" id = \"group\" onchange = \"changeURL()\" required><option disabled selected>**請選擇**</option>";
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
<script>
function changeURL()
{
	 var x = document.getElementById("group").value;
	 var group = x.substring(0,3);
	 var length = x.length;
	 var name = x.substring(4,length);
	 var x = document.getElementById("group").value;
	 var group = x.substring(0,3);
	 var length = x.length;
	 var name = x.substring(4,length);
	 if (group == "颲風衡") 
	 {	
		if (name == "颲1")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJccVJIRF9UWWxfTTA";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJccVJIRF9UWWxfTTA";
		}
		else if (name == "颲2")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcQlFCZktoSVhXeEk";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcQlFCZktoSVhXeEk";
		}
		else if (name == "颲3")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcdXE3UVRqeU90SGc";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcdXE3UVRqeU90SGc";
		}
		else if (name == "颲4")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B9gDTa4j72EpYjlOVktTZXJjMEU";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B9gDTa4j72EpYjlOVktTZXJjMEU";
		}
		else if (name == "颲5")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B9gDTa4j72EpRlBXQXAtQ0dBREk";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B9gDTa4j72EpRlBXQXAtQ0dBREk";
		}
		else if (name == "颲6")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B9gDTa4j72EpN2QybER1R2hrZDA";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B9gDTa4j72EpN2QybER1R2hrZDA";
		}
		else
		{
		document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcdTBJUGxnRG9melE";
		document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcdTBJUGxnRG9melE";
		}
	 }
	 if (group == "弦騫雪")
	 {	 
		if (name == "弦1")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcSE9BZ2Q0cHl2RVk";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcSE9BZ2Q0cHl2RVk";
		}
		else if (name == "弦2")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcaXJrY01BNjl2TnM";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcaXJrY01BNjl2TnM";
		}
		else if (name == "弦3")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJccVhZNzlBcjBjMEU";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJccVhZNzlBcjBjMEU";
		}
		else if (name == "弦4")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B9gDTa4j72EpdWZLYnVaZjg1d0k";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B9gDTa4j72EpdWZLYnVaZjg1d0k";
		}
		else if (name == "弦5")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B9gDTa4j72EpVExnSWNhQWdiYzA";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B9gDTa4j72EpVExnSWNhQWdiYzA";
		}
		else if (name == "弦6")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B9gDTa4j72EpeDNyS1N1dUgwLVE";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B9gDTa4j72EpeDNyS1N1dUgwLVE";
		}
		else
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcbHVWWTlvVXVNdEE";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcbHVWWTlvVXVNdEE";
		}
	 }
	 if (group == "焰千璇") 
	 {
		 if (name == "焰1")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcT3lldGNtTThRZDg";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcT3lldGNtTThRZDg";
		}
		else if (name == "焰2")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcZmNqOHlBWTV4WEU";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcZmNqOHlBWTV4WEU";
		}
		else if (name == "焰3")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcdUlDWmJFdzBuaUU";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcdUlDWmJFdzBuaUU";
		}
		else if (name == "焰4")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B3YePlrI5wsXaGhYWXRGLVFGblU";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B3YePlrI5wsXaGhYWXRGLVFGblU";
		}
		else if (name == "焰5")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B3YePlrI5wsXZHFDNE9vQWF6ZTQ";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B3YePlrI5wsXZHFDNE9vQWF6ZTQ";
		}
		else if (name == "焰6")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B3YePlrI5wsXTHRRUjlWaE9MNGs";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B3YePlrI5wsXTHRRUjlWaE9MNGs";
		}
		else
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcWUhCOTNzRjJJY1k";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcWUhCOTNzRjJJY1k";
		}
		 
	 }
	 if (group == "霹雲天") 
	 {
		  if (name == "二人霹靂三人回")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcQ2RGckJuVmtjTW8";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcQ2RGckJuVmtjTW8";
		}
		else if (name == "葡萄霹力多舊魚")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJcVHRkTGxvZ0xhQkk";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJcVHRkTGxvZ0xhQkk";
		}
		else if (name == "豆豆熊燒little pig")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B9gDTa4j72EpUWFkQ3V2enRnVW8";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B9gDTa4j72EpUWFkQ3V2enRnVW8";
		}
		else if (name == "不堪一霹邪留丸")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B9gDTa4j72EpUWFkQ3V2enRnVW8";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B9gDTa4j72EpUWFkQ3V2enRnVW8";
		}
		else if (name == "霹啪紙飛機械人")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B9gDTa4j72EpREMwbGczVUVwN3M";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B9gDTa4j72EpREMwbGczVUVwN3M";
		}
		else if (name == "霹礫砂糖果然翁")
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B9gDTa4j72Epb0xSMl9McUdPckk";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B9gDTa4j72Epb0xSMl9McUdPckk";
		}
		else
		{
			document.getElementById("URL").href = "https://drive.google.com/drive/folders/0B13Qjvq3prJccHpfWXJsUDJUclk";
			document.getElementById("_URL").value = "https://drive.google.com/drive/folders/0B13Qjvq3prJccHpfWXJsUDJUclk";
		}
	 }
}
</script>
</td></tr>

<tr><td>任務</td>
<td>
<?php 
$result = mysqli_query($db,"SELECT `ID`,`place` FROM `mission`") or die("failed"); 
echo "<select name = \"task\" id = \"task\" required><option disabled selected>**請選擇**</option>";
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

<tr><td>證明</td><td><!--<input type="file" name = "file" id = "file" required>--> <a href = "" target="_blank" id = "URL">提交證明</a><input type = "hidden" id = "_URL" name = "URL"></td></tr>
<tr><td colspan = "2"><input type = "submit" name = "add" value = "提交"><td></tr>
</table>
</form>
<?php 
if (isset($_POST['add']))
{
	$tmp = $_POST['group'];
	$tmp1 = explode( ':', $tmp );
	$group = $tmp1[0];
	$name = $tmp1[1];
	$tmp = $_POST['task'];
	$tmp1 = explode( ':', $tmp );
	$taskID = $tmp1[0];
	$taskInfo = $tmp1[1];
	$URL = $_POST['URL'];
	//Upload file
	/*$filename = $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$target_name = $taskID."-".time()."-".$filename;
	
	if (isset($filename))
	{
		if (!empty($filename)) 
		{
			$location = '../upload/';
		}
		if (move_uploaded_file($tmp_name, $location.$target_name))
		{
			echo '';
		} else 
		{
			echo 'There was an error.';
			die;
			
		}
	}
	else
	{
		echo '請選擇相片影片';
	}*/
	//End upload file
	$sql = "INSERT INTO `approval` (`FinishedTime`, `group`, `name`, `missionID`, `MissionPath`,`status`) VALUES (NOW(),'".$group."','".$name."','".$taskID."','".$URL."','0');";
	mysqli_query($db,$sql) or die("Not able to submiited");
	echo "成功提交 <br> 大組: ".$group." <br> 細組名: ".$name." <br> 任務編號: ".$taskID." <br> 任務地點: ".$taskInfo;
	
	//header("Refresh:0");
}
?>
