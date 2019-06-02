<?
  $Project_ID= $_GET['Project_ID'];
  $link=mysql_connect("localhost", "root", "1234");
  mysql_query("set names utf8");
  mysql_select_db("artsa",$link);
  $sql = "DELETE FROM project WHERE Project_ID=$Project_ID";
  mysql_query($sql,$link);
  mysql_close($link);
  header("location: PM.php");
?>