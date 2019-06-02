
<?php


session_start();
if(! isset($_SESSION["Mail"])){
  header("Location: Sign.php?");
  
}$mail=$_SESSION["Mail"];
$pon=$_SESSION["Provider_or_not"];




if($_GET['name']){

$Username=$_GET['name'];

$Mail=$_GET['email'];

$Gender=$_GET['gender'];

$Birth=$_GET['birth'];

$Tag=$_GET['tag'];

$Year=$_GET['year'];

$Phone=$_GET['phone'];

$Area=$_GET['zone'];

$Address=$_GET['address'];

$Workexperience=$_GET['experience'];

$Photo=$_GET['photo'];

$link=mysql_connect("localhost","root","1234");
mysql_query("set names utf8");
mysql_select_db("artsa",$link);
$sql ="INSERT INTO `profile`(`Username`,`Mail`,`Gender`,`Birth`,`Tag`,`Year`,`Phone`,`Area`,`Address`,`Workexperience`,`Photo`) VALUES 
('$Username','$Mail','$Gender','$Birth','$Tag',$Year,$Phone,'$Area','$Address','$Workexperience','$Photo')";
    mysql_query($sql,$link);
    mysql_close($link);
header("location:MemberCenter.html");
};
?>



  