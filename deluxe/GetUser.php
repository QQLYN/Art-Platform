<?php
session_start();
if(isset($_SESSION["Mail"])){
		//echo "xx";
		//echo $_SESSION["Mail"];
		$json = array("Mail" => $_SESSION["Mail"]);
		echo json_encode($json);
	}
?>