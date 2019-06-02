<?php

	
	$Identity = json_encode(@$_POST["role"]);
	session_start();
	$_SESSION['role'] = $Identity;
	$Mail = json_encode(@$_POST["Mail"]);
	//echo $Identity;
	$Link = mysql_connect('localhost', 'root', '1234');
	mysql_select_db('artsa',$Link)or die($connect_error);
	$data = mysql_query("UPDATE `account` SET `role`=".$Identity );
	$result = mysql_query("SELECT `role` FROM `account`");
	if(!$result)
	{
		echo ("Error: ".mysql_error($Link));
		exit();
	}
	while ($row = mysql_fetch_array($result)) {
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
	
	mysql_close($Link);
?>