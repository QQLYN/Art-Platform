<?
session_start();
$mail = $_SESSION[Mail];
$role=$_SESSION[role];
if($_GET['photo']){
      $photo=$_GET['photo'];
      $name=$_GET['name'];
      $content=$_GET['content'];
      $zone=$_GET['zone']; 
      $tag=$_GET['tag']; 
      $price=$_GET['price']; 
      $link=mysql_connect("localhost","root","1234");
      mysql_query("set names utf8");
      mysql_select_db("artsa",$link);
      $sql="INSERT INTO `project` (`role`,`Propic_name`,`Mail`, `Project_name`,`Content`, `Area`, `Tag`, `Price`) VALUES ($role, '$photo','$mail','$name','$content','$zone','$tag',$price)";
      mysql_query($sql,$link);
      mysql_close($link);
      header("location: PM.php");
  };
  ?>