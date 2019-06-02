<?php

	
	$Identity = json_encode(@$_POST["role"]);
	session_start();
	$_SESSION['role'] = $Identity;
	$Mail = json_encode(@$_POST["Mail"]);
	echo $_SESSION['role'];
	$Link = mysqli_connect('localhost', 'ARTSA', 'artsa108');
	mysqli_select_db($Link,'artsa')or die($connect_error);
	$data = mysql_query("UPDATE `account` SET `role`=".$Identity."where `Mail` = '".$Mail."'" );
	$result = mysql_query("SELECT `role` FROM `account`where `Mail` = '".$Mail."'");
	if(!$result)
	{
		echo ("Error: ".mysqli_error($Link));
		exit();
	}
	while ($row = mysqli_fetch_array($result)) {
		//echo 'Identity = ';
		if($row['role'] == 1)
		{
			$_SESSION['role'] = 1;
			echo "COUMSER";
		}
		if($row['role'] == 2)
		{
			$_SESSION['role'] = 2;
			echo "PHOTOGRAPHER";
		}
		//echo json_encode(array('Identity' => $row['Identity']));
	}
	
	mysqli_close($Link);
?>