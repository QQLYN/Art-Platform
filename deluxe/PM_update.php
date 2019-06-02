<?
  $Project_ID=$_GET["Project_ID"];
  $link=mysql_connect("localhost", "root", "1234");
  mysql_query("set names utf8");
  mysql_select_db("artsa",$link);
     
  if($_POST['Project_name']){
  $Propic_name=$_POST['Propic_name'];
  $Project_name=$_POST['Project_name'];
  $Content=$_POST['Content'];
  $Area=$_POST['Area'];
  $Tag=$_POST['Tag'];
  $Price=$_POST['Price'];
  $sql = "UPDATE project SET Propic_name='$Propic_name', Project_name='$Project_name', Content='$Content', Area='$Area', Tag='$Tag', Price='$Price' where Project_ID=$Project_ID";
  mysql_query($sql,$link);
  mysql_close($link);
  header("location:PM.php");
  };
?>