<?php
session_start();
if(isset($_SESSION["Mail"])){
		//echo "xx";
		//echo $_SESSION["Mail"];
		$json = array("Mail" => $_SESSION["Mail"], "role" => $_SESSION["role"], "Provider_or_not" => $_SESSION[Provider_or_not]);
		echo json_encode($json);
	}
?>