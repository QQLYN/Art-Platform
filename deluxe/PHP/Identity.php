<?php

	session_start();
	$Identity = json_encode(@$_POST["role"]);
	$Mail = json_encode(@$_POST["Mail"]);
	//echo $Identity;
	$Link = mysqli_connect('localhost', 'root', '1234');
	mysqli_select_db($Link,'artsa')or die($connect_error);
	$data = mysqli_query($Link,"UPDATE `account` SET `role`=".$Identity ."where `Mail` = ".$Mail );
	$result = mysqli_query($Link,"SELECT `role` FROM `account`where `Mail` = ".$Mail);
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