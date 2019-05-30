<?php
	$Identity = json_encode($_POST['role']);
	//echo $Identity;
	$Link = mysqli_connect('localhost', 'ARTSA', 'artsa108');
	mysqli_select_db($Link,'artsa')or die($connect_error);
	$data = mysqli_query($Link,"UPDATE `test` SET `role`=".$Identity);
	$result = mysqli_query($Link,"SELECT `role` FROM `test`");
	if(!$result)
	{
		echo ("Error: ".mysqli_error($Link));
		exit();
	}
	while ($row = mysqli_fetch_array($result)) {
		//echo 'Identity = ';
		if($row['role'] == 1)
		{
			echo "COUMSER";
		}
		if($row['role'] == 2)
		{
			echo "PHOTOGRAPHER";
		}
		//echo json_encode(array('Identity' => $row['Identity']));
	}
	
	mysqli_close($Link);
?>