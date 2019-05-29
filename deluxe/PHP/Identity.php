<?php
	$identity = $_POST['identity'];
	$json = array('msg' => $identity);
	echo $identity;
	echo json_encode($json);
?>