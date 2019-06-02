<?
session_start();
if(! isset($_SESSION['Mail'])){
    header("Location:Sign.php");
}
$mail=$_SESSION[Mail];
$role=$_SESSION[role];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tabstyle.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <?
    $link1 = mysql_connect("localhost", "root", "1234");
    mysql_query("set names utf8");
    mysql_select_db("artsa", $link1);
    if(empty($searchtxt)){
        $sql1="select * from project";
    }
    $RS1=mysql_query($sql1,$link1);
    while($record1 = mysql_fetch_row($RS1)) {
        ?>
    <script>
        $(document).ready(function(){
            $("p<? echo $record1[0]?>").hide(100);
            $("bt<? echo $record1[0]?>").hide(100);
            $(".bt<? echo $record1[0]?>").click(function () {
            $("p<? echo $record1[0]?>").slideUp();
            $("pp<? echo $record1[0]?>").slideDown();
            });
            $(".btn<? echo $record1[0]?>").click(function(){
            $("p<? echo $record1[0]?>").slideDown();
            $("bt<? echo $record1[0]?>").slideDown();
            $("pp<? echo $record1[0]?>").slideUp();
            });
        });
      </script>
      
      <?
    ;}
        ?>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
    $( document ).ready(function() {
        console.log( "document loaded" );
    $.ajax
        ({
                url:"http://localhost/SA/deluxe/PHP/CheckIdentity.php",  
                type:"POST",
                data:{},
                dataType:"json",
                success:function(data)
                {
                  console.log(data.Identity);
                  console.log("good");
                },
                error: function(xhr) { 
                   console.log(xhr.responseText);
                }        
        })

    });
  </script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">ARTSA</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="collection.html" class="nav-link">Collection</a></li>
	          <li class="nav-item"><a href="transaction.php" class="nav-link">Transcation</a></li>
              <li class="nav-item"><a href="MemberCenter.html" class="nav-link">Account</a></li>
              <?
if($_SESSION['Mail']){
    echo'<li class="nav-item"><a href="log-out.php" class="nav-link">Logout</a></li>';
}
?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	             <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>專案管理</span></p>
	            <h1 class="mb-4 bread">專案管理</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section bg-light">
    <?
        if($_SESSION[Provider_or_not]==0){
     $link4=mysql_connect("localhost","root","1234");
     mysql_query("set names utf8");
     mysql_select_db("artsa",$link4);
  $sqlacc="select * from project where Mail='$mail'";
  $rsacc=mysql_query($sqlacc,$link4);                           
$recordacc=mysql_fetch_row($rsacc)
        ?>
    	<div class="container">
            <div class="row justify-content-center mb-5 pb-3">
            <div style="display:inline; width: 100%" align=left>
            <button class="button button1" data-toggle="modal" data-target="#myModal">新增專案</button>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog model-dialog-centered modal-lg" role="document" style="width:800px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
			</div>
			<form action="PM_in.php" method="get">
			<div class="modal-body">
				<table align=center style="text-align:center;border-collapse:separate;" rules="none" >
         <input type="hidden" name="role"
 value="1">          <tr>
              <td><font color="red">＊</font>上傳照片</td>
             <td><input name="photo" accept="image/jpeg,image/jpg" style="width: 280px" required></td>
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>專案需求標題</td>
              <td><input type="text" name="name" style="width: 280px" required></td>
          </tr>
<script type="text/javascript">
function collect_submit() {
var len = $(".content").val().length;
var num = 1000 - len;
var myselect=document.getElementById("zone");
var index=myselect.selectedIndex;             // selectedIndex代表的是你所选中项的index
if(myselect.options[index].value=="地區"){
    alert("地區沒有輸入");
return false;
}
var mysel=document.getElementById("tag");
var ind=mysel.selectedIndex ;             // selectedIndex代表的是你所选中项的index
if(mysel.options[ind].value=='類別'){
    alert("類別沒有輸入");
return false;
}
if (len > 1001) {
$(this).val($(this).val().substring(0, 1000));
}
if (len < 10) {
alert("專案需求內容輸入最少10個字");
return false;
}

}
</script>
          <tr height=50>
              <td><font color="red">＊</font>需求專案內容</td>
              <td><textarea rows="5" style="width: 280px" name="content" class="content" required 
onchange="this.value=this.value.substring(0, 1000)"
onkeydown="this.value=this.value.substring(0, 1000)"
onkeyup="this.value=this.value.substring(0, 1000)"
placeholder="至少10個字"></textarea></td>
                    </tr>
          <tr height=50>
              <td><font color="red">＊</font>地區</td>
              <td style="padding-right: 180px"><select name="zone" id="zone" style="width: 100px" required>
              <option value="地區" selected>地區</option>
              <option value="台北市">台北市</option>
              <option value="新北市">新北市</option>
              <option value="桃園市">桃園市</option>
              <option value="台中市">台中市</option>
              <option value="台南市">台南市</option>
              <option value="高雄市">高雄市</option></select></td>
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>類別</td>
              <td style="padding-right: 180px"><select name="tag" id="tag" style="width: 100px" required>
              <option value="類別" selected>類別</option>
              <option value="人像">人像</option>
              <option value="風景">風景</option>
              <option value="動物">動物</option>
              <option value="食物">食物</option>
              <option value="商品">商品</option></select></td> 
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>期望價格</td>
              <td style="padding-right: 80px">$&nbsp;<input type="text" name="price" style="width: 100px" required> 元 / 每張照片</td>
          </tr>
      </table>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消
				</button>
				<input type="submit" class="btn btn-primary" value="發佈!" onclick="collect_submit()">
                </div></div></form>
                   </div></div></div></div></div>
            		<div class="row">
    <?
    $link=mysql_connect("localhost","root","1234");
     mysql_query("set names utf8");
     mysql_select_db("artsa",$link);
  $sql="select * from project where role=1 and Mail='$mail'";
    $rs=mysql_query($sql,$link);
    while($record=mysql_fetch_row($rs)){
                          ?>
    <div class="modal fade" id="model<? echo $record[0];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog model-dialog-centered modal-lg" role="document" style="width:800px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
			</div>
			<form method="post" action="PM_update.php?Project_ID=<? echo $record[0]; ?>">
			<div class="modal-body">
				<table align=center style="text-align:center;border-collapse:separate;" rules="none">
          <tr>
             <td><font color="red">＊</font>上傳照片
             <td><input name="Propic_name" accept="image/jpeg,image/jpg" style="width: 310px" value="<? echo $record[12]?>"required></td>
            </tr>
          <tr height=50>
              <td><font color="red">＊</font>專案需求標題</td>
              <td><input type="text" name="Project_name" style="width: 310px" value="<? echo $record[2]?>" required></td>
          </tr>
          <script type="text/javascript">
function c_submit_<? echo $record[0];?>() {
var len = $(".Content_<? echo $record[0];?>").val().length;
var num = 1000 - len;
var myselect=document.getElementById("Area_<? echo $record[0];?>");
var index=myselect.selectedIndex;             // selectedIndex代表的是你所选中项的index
if(myselect.options[index].value=="地區"){
    alert("地區沒有輸入");
    return false;
}
var mysel=document.getElementById("Tag_<? echo $record[0];?>");
var ind=mysel.selectedIndex;             // selectedIndex代表的是你所选中项的index
if(mysel.options[ind].value=="類別"){
    alert("類別沒有輸入");
    return false;
}
if (len > 1001) {
$(this).val($(this).val().substring(0, 1000));
}
if (len < 10) {
alert("專案需求內容輸入最少10個字");
return false;
}

}
</script>
          <tr height=50>
              <td><font color="red">＊</font>需求專案內容</td>
              <td><textarea rows="5" style="width: 310px" name="Content" class="Content_<? echo $record[0];?>" required 
onchange="this.value=this.value.substring(0, 1000)"
onkeydown="this.value=this.value.substring(0, 1000)"
onkeyup="this.value=this.value.substring(0, 1000)"
placeholder="至少10個字"><? echo $record[11]?></textarea></td>
                    </tr>
          <tr height=50>
              <td><font color="red">＊</font>地區</td>
              <td style="padding-right: 210px"><select name="Area" id="Area_<? echo $record[0];?>" style="width: 100px">
            <option value="地區" selected>地區</option>
              <option value="台北市">台北市</option>
              <option value="新北市">新北市</option>
              <option value="桃園市">桃園市</option>
              <option value="台中市">台中市</option>
              <option value="台南市">台南市</option>
              <option value="高雄市">高雄市</option></select></td>
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>類別</td>
              <td style="padding-right: 210px"><select name="Tag" id="Tag_<? echo $record[0];?>" style="width: 100px">
               <option value="類別" selected>類別</option>
              <option value="人像">人像</option>
              <option value="風景">風景</option>
              <option value="動物">動物</option>
              <option value="食物">食物</option>
              <option value="商品">商品</option></select></td> 
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>期望價格</td>
              <td style="padding-right: 110px">$&nbsp;<input type="text" name="Price" value="<? echo $record[7]?>" style="width: 100px" required> 元 / 每張照片</td>
          </tr>
      </table>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <input type="submit" class="btn btn-primary" value="修改完成!" onclick="return c_submit_<? echo $record[0];?>()"></div></div></form>
        </div></div></div>
   
    			<div class="col-sm col-md-6 col-lg-4 ftco-animate">
    				<div class="room">
    					<a href="rooms.html" class="img d-flex justify-content-center align-items-center" style="background-image: url(<? echo $record[12]?>);">
    						<div class="justify-content-center align-items-center">
    						</div>
    					</a>
                           <div class="text p-3">
                               <h3 class="mb-3"><div style="float: right"><i style='font-size:16px' class='far' data-toggle="modal" data-target="#model<? echo $record[0]?>">&#xf044;</i>&nbsp;&nbsp;<? echo "<a href=PM_del.php?method=delete&Project_ID=$record[0]>" ?><i style='font-size:16px' class='far'>&#xf2ed;</i><? echo "</a>" ?></div><a href="rooms.html"><? echo $record[2]?></a></h3>
                               <pp<? echo $record[0]?>><img src="images/down.png" width="5%" class="btn<? echo $record[0]?>"></pp<? echo $record[0]?>>
                              <p<? echo $record[0]?>><? echo $record[11]?><br><img src="images/up.png" width="5%" class="bt<? echo $record[0]?>"></p<? echo $record[0]?>>
                               
    						<p><span class="price mr-2" id="price"><? echo $record[7]?></span> <span class="per">每張照片</span></p>
                            
                            <p><i class='fas fa-map-marker-alt' id="area"></i>&nbsp;&nbsp;
                                <? echo $record[5]?>&nbsp;&nbsp;&nbsp;
                                <i class='fas fa-image' id="tag"></i>&nbsp;&nbsp;
                                <? echo $record[6]?></p>
                           
    						<hr>
                            <p class="pt-1">交易筆數：<? echo $record[10]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;星等：<? echo $record[9]?></p>
                        </div>
    				</div>
    			</div>
    			<?
    ;}
        }
        ?>
              </div>
                </div>
        <?
        if($_SESSION[Provider_or_not]==1){
    if($_SESSION[role]==1){
    $link = mysql_connect("localhost", "root", "1234");
    mysql_query("set names utf8");
    mysql_select_db("artsa", $link);
    $sql="select * from project where role=1 and Mail='$mail';";
    $RS=mysql_query($sql,$link);
        ?>
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
            <div style="display:inline; width: 100%" align=left>
            <button class="button button1" data-toggle="modal" data-target="#mModal">新增專案</button>
            <div class="modal fade" id="mModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog model-dialog-centered modal-lg" role="document" style="width:800px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
			</div>
			<form action="PM_in.php" method="get">
			<div class="modal-body">
				<table align=center style="text-align:center;border-collapse:separate;" rules="none" >
          <tr>
              <td><font color="red">＊</font>上傳照片</td>
             <td><input name="photo" accept="image/jpeg,image/jpg" style="width: 280px" required></td>
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>專案需求標題</td>
              <td><input type="text" name="name" style="width: 280px" required></td>
          </tr>
<script type="text/javascript">
function collect_submitt() {
var len = $(".content1").val().length;
var num = 1000 - len;
var myselect=document.getElementById("zone1");
var index=myselect.selectedIndex;             // selectedIndex代表的是你所选中项的index
if(myselect.options[index].value=="地區"){
    alert("地區沒有輸入");
return false;
}
var mysel=document.getElementById("tag1");
var ind=mysel.selectedIndex ;             // selectedIndex代表的是你所选中项的index
if(mysel.options[ind].value=='類別'){
    alert("類別沒有輸入");
return false;
}
if (len > 1001) {
$(this).val($(this).val().substring(0, 1000));
}
if (len < 10) {
alert("專案需求內容輸入最少10個字");
return false;
}

}
</script>
          <tr height=50>
              <td><font color="red">＊</font>需求專案內容</td>
              <td><textarea rows="5" style="width: 280px" name="content" class="content1" required 
onchange="this.value=this.value.substring(0, 1000)"
onkeydown="this.value=this.value.substring(0, 1000)"
onkeyup="this.value=this.value.substring(0, 1000)"
placeholder="至少10個字"></textarea></td>
                    </tr>
          <tr height=50>
              <td><font color="red">＊</font>地區</td>
              <td style="padding-right: 180px"><select name="zone" id="zone1" style="width: 100px" required>
              <option value="地區" selected>地區</option>
              <option value="台北市">台北市</option>
              <option value="新北市">新北市</option>
              <option value="桃園市">桃園市</option>
              <option value="台中市">台中市</option>
              <option value="台南市">台南市</option>
              <option value="高雄市">高雄市</option></select></td>
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>類別</td>
              <td style="padding-right: 180px"><select name="tag" id="tag1" style="width: 100px" required>
              <option value="類別" selected>類別</option>
              <option value="人像">人像</option>
              <option value="風景">風景</option>
              <option value="動物">動物</option>
              <option value="食物">食物</option>
              <option value="商品">商品</option></select></td> 
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>期望價格</td>
              <td style="padding-right: 80px">$&nbsp;<input type="text" name="price" style="width: 100px" required> 元 / 每張照片</td>
          </tr>
      </table>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消
				</button>
				<input type="submit" class="btn btn-primary" value="發佈!" onclick="collect_submitt()">
                </div></div></form>
                   </div></div></div>
                   </div>
                   </div>
            		<div class="row">
            		<?
        while($record=mysql_fetch_row($RS)){
            ?>
    <div class="modal fade" id="model<? echo $record[0];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog model-dialog-centered modal-lg" role="document" style="width:800px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
			</div>
			<form method="post" action="PM_update.php?Project_ID=<? echo $record[0]; ?>">
			<div class="modal-body">
				<table align=center style="text-align:center;border-collapse:separate;" rules="none">
          <tr>
             <td><font color="red">＊</font>上傳照片
             <td><input name="Propic_name" accept="image/jpeg,image/jpg" style="width: 310px" value="<? echo $record[12]?>"required></td>
            </tr>
          <tr height=50>
              <td><font color="red">＊</font>專案需求標題</td>
              <td><input type="text" name="Project_name" style="width: 310px" value="<? echo $record[2]?>" required></td>
          </tr>
          <script type="text/javascript">
function c_submitt_<? echo $record[0];?>() {
var len = $(".Contentt_<? echo $record[0];?>").val().length;
var num = 1000 - len;
var myselect=document.getElementById("Areaa_<? echo $record[0];?>");
var index=myselect.selectedIndex;             // selectedIndex代表的是你所选中项的index
if(myselect.options[index].value=="地區"){
    alert("地區沒有輸入");
    return false;
}
var mysel=document.getElementById("Tagg_<? echo $record[0];?>");
var ind=mysel.selectedIndex;             // selectedIndex代表的是你所选中项的index
if(mysel.options[ind].value=="類別"){
    alert("類別沒有輸入");
    return false;
}
if (len > 1001) {
$(this).val($(this).val().substring(0, 1000));
}
if (len < 10) {
alert("專案需求內容輸入最少10個字");
return false;
}

}
</script>
          <tr height=50>
              <td><font color="red">＊</font>需求專案內容</td>
              <td><textarea rows="5" style="width: 310px" name="Content" class="Contentt_<? echo $record[0];?>" required 
onchange="this.value=this.value.substring(0, 1000)"
onkeydown="this.value=this.value.substring(0, 1000)"
onkeyup="this.value=this.value.substring(0, 1000)"
placeholder="至少10個字"><? echo $record[11]?></textarea></td>
                    </tr>
          <tr height=50>
              <td><font color="red">＊</font>地區</td>
              <td style="padding-right: 210px"><select name="Area" id="Areaa_<? echo $record[0];?>" style="width: 100px">
            <option value="地區" selected>地區</option>
              <option value="台北市">台北市</option>
              <option value="新北市">新北市</option>
              <option value="桃園市">桃園市</option>
              <option value="台中市">台中市</option>
              <option value="台南市">台南市</option>
              <option value="高雄市">高雄市</option></select></td>
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>類別</td>
              <td style="padding-right: 210px"><select name="Tag" id="Tagg_<? echo $record[0];?>" style="width: 100px">
               <option value="類別" selected>類別</option>
              <option value="人像">人像</option>
              <option value="風景">風景</option>
              <option value="動物">動物</option>
              <option value="食物">食物</option>
              <option value="商品">商品</option></select></td> 
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>期望價格</td>
              <td style="padding-right: 110px">$&nbsp;<input type="text" name="Price" value="<? echo $record[7]?>" style="width: 100px" required> 元 / 每張照片</td>
          </tr>
      </table>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <input type="submit" class="btn btn-primary" value="修改完成!" onclick="return c_submitt_<? echo $record[0];?>()"></div></div></form>
        </div></div></div>
    			<div class="col-sm col-md-6 col-lg-4 ftco-animate">
    				<div class="room">
    					<a href="rooms.html" class="img d-flex justify-content-center align-items-center" style="background-image: url(<? echo $record[12]?>);">
    						<div class="justify-content-center align-items-center">
    						</div>
    					</a>
                           <div class="text p-3">
                               <h3 class="mb-3"><div style="float: right"><i style='font-size:16px' class='far' data-toggle="modal" data-target="#model<? echo $record[0]?>">&#xf044;</i>&nbsp;&nbsp;<? echo "<a href=PM_del.php?method=delete&Project_ID=$record[0]>" ?><i style='font-size:16px' class='far'>&#xf2ed;</i><? echo "</a>" ?></div><a href="rooms.html"><? echo $record[2]?></a></h3>
                               <pp<? echo $record[0]?>><img src="images/down.png" width="5%" class="btn<? echo $record[0]?>"></pp<? echo $record[0]?>>
                              <p<? echo $record[0]?>><? echo $record[11]?><br><img src="images/up.png" width="5%" class="bt<? echo $record[0]?>"></p<? echo $record[0]?>>
                               
    						<p><span class="price mr-2" id="price"><? echo $record[7]?></span> <span class="per">每張照片</span></p>
                            
                            <p><i class='fas fa-map-marker-alt' id="area"></i>&nbsp;&nbsp;
                                <? echo $record[5]?>&nbsp;&nbsp;&nbsp;
                                <i class='fas fa-image' id="tag"></i>&nbsp;&nbsp;
                                <? echo $record[6]?></p>
                           
    						<hr>
                            <p class="pt-1">交易筆數：<? echo $record[10]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;星等：<? echo $record[9]?></p>
                        </div>
    				</div>
    			</div>
    			<?            
    }
    }
        ?>
    <?
    if($_SESSION[role]==2){
    $linkk = mysql_connect("localhost", "root", "1234");
    mysql_query("set names utf8");
    mysql_select_db("artsa", $linkk);
    $sqll="select * from project where role=2 and Mail='$mail';";
    $RSS=mysql_query($sqll,$linkk);
        ?> 
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
            <div style="display:inline; width: 100%" align=left>
            <button class="button button1" data-toggle="modal" data-target="#mModal">新增專案</button>
            <div class="modal fade" id="mModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog model-dialog-centered modal-lg" role="document" style="width:800px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
			</div>
			<form action="PM_in.php" method="get">
			<div class="modal-body">
				<table align=center style="text-align:center;border-collapse:separate;" rules="none" >
          <tr>
              <td><font color="red">＊</font>上傳照片</td>
             <td><input name="photo" accept="image/jpeg,image/jpg" style="width: 280px" required></td>
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>專案需求標題</td>
              <td><input type="text" name="name" style="width: 280px" required></td>
          </tr>
<script type="text/javascript">
function collect_submitt() {
var len = $(".content1").val().length;
var num = 1000 - len;
var myselect=document.getElementById("zone1");
var index=myselect.selectedIndex;             // selectedIndex代表的是你所选中项的index
if(myselect.options[index].value=="地區"){
    alert("地區沒有輸入");
return false;
}
var mysel=document.getElementById("tag1");
var ind=mysel.selectedIndex ;             // selectedIndex代表的是你所选中项的index
if(mysel.options[ind].value=='類別'){
    alert("類別沒有輸入");
return false;
}
if (len > 1001) {
$(this).val($(this).val().substring(0, 1000));
}
if (len < 10) {
alert("專案需求內容輸入最少10個字");
return false;
}

}
</script>
          <tr height=50>
              <td><font color="red">＊</font>需求專案內容</td>
              <td><textarea rows="5" style="width: 280px" name="content" class="content1" required 
onchange="this.value=this.value.substring(0, 1000)"
onkeydown="this.value=this.value.substring(0, 1000)"
onkeyup="this.value=this.value.substring(0, 1000)"
placeholder="至少10個字"></textarea></td>
                    </tr>
          <tr height=50>
              <td><font color="red">＊</font>地區</td>
              <td style="padding-right: 180px"><select name="zone" id="zone1" style="width: 100px" required>
              <option value="地區" selected>地區</option>
              <option value="台北市">台北市</option>
              <option value="新北市">新北市</option>
              <option value="桃園市">桃園市</option>
              <option value="台中市">台中市</option>
              <option value="台南市">台南市</option>
              <option value="高雄市">高雄市</option></select></td>
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>類別</td>
              <td style="padding-right: 180px"><select name="tag" id="tag1" style="width: 100px" required>
              <option value="類別" selected>類別</option>
              <option value="人像">人像</option>
              <option value="風景">風景</option>
              <option value="動物">動物</option>
              <option value="食物">食物</option>
              <option value="商品">商品</option></select></td> 
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>期望價格</td>
              <td style="padding-right: 80px">$&nbsp;<input type="text" name="price" style="width: 100px" required> 元 / 每張照片</td>
          </tr>
      </table>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消
				</button>
				<input type="submit" class="btn btn-primary" value="發佈!" onclick="collect_submitt()">
                </div></div></form>
                   </div></div></div></div></div>
            		<div class="row">
        <?
        while($record1 = mysql_fetch_row($RSS)){
            ?>
    <div class="modal fade" id="model<? echo $record1[0];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog model-dialog-centered modal-lg" role="document" style="width:800px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
			</div>
			<form method="post" action="PM_update.php?Project_ID=<? echo $record1[0]; ?>">
			<div class="modal-body">
				<table align=center style="text-align:center;border-collapse:separate;" rules="none">
          <tr>
             <td><font color="red">＊</font>上傳照片
             <td><input name="Propic_name" accept="image/jpeg,image/jpg" style="width: 310px" value="<? echo $record1[12]?>"required></td>
            </tr>
          <tr height=50>
              <td><font color="red">＊</font>專案需求標題</td>
              <td><input type="text" name="Project_name" style="width: 310px" value="<? echo $record1[2]?>" required></td>
          </tr>
          <script type="text/javascript">
function c_submitt_<? echo $record1[0];?>() {
var len = $(".Contentt_<? echo $record1[0];?>").val().length;
var num = 1000 - len;
var myselect=document.getElementById("Areaa_<? echo $record1[0];?>");
var index=myselect.selectedIndex;             // selectedIndex代表的是你所选中项的index
if(myselect.options[index].value=="地區"){
    alert("地區沒有輸入");
    return false;
}
var mysel=document.getElementById("Tagg_<? echo $record1[0];?>");
var ind=mysel.selectedIndex;             // selectedIndex代表的是你所选中项的index
if(mysel.options[ind].value=="類別"){
    alert("類別沒有輸入");
    return false;
}
if (len > 1001) {
$(this).val($(this).val().substring(0, 1000));
}
if (len < 10) {
alert("專案需求內容輸入最少10個字");
return false;
}

}
</script>
          <tr height=50>
              <td><font color="red">＊</font>需求專案內容</td>
              <td><textarea rows="5" style="width: 310px" name="Content" class="Contentt_<? echo $record1[0];?>" required 
onchange="this.value=this.value.substring(0, 1000)"
onkeydown="this.value=this.value.substring(0, 1000)"
onkeyup="this.value=this.value.substring(0, 1000)"
placeholder="至少10個字"><? echo $record1[11]?></textarea></td>
                    </tr>
          <tr height=50>
              <td><font color="red">＊</font>地區</td>
              <td style="padding-right: 210px"><select name="Area" id="Areaa_<? echo $record1[0];?>" style="width: 100px">
            <option value="地區" selected>地區</option>
              <option value="台北市">台北市</option>
              <option value="新北市">新北市</option>
              <option value="桃園市">桃園市</option>
              <option value="台中市">台中市</option>
              <option value="台南市">台南市</option>
              <option value="高雄市">高雄市</option></select></td>
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>類別</td>
              <td style="padding-right: 210px"><select name="Tag" id="Tagg_<? echo $record1[0];?>" style="width: 100px">
               <option value="類別" selected>類別</option>
              <option value="人像">人像</option>
              <option value="風景">風景</option>
              <option value="動物">動物</option>
              <option value="食物">食物</option>
              <option value="商品">商品</option></select></td> 
          </tr>
          <tr height=50>
              <td><font color="red">＊</font>期望價格</td>
              <td style="padding-right: 110px">$&nbsp;<input type="text" name="Price" value="<? echo $record1[7]?>" style="width: 100px" required> 元 / 每張照片</td>
          </tr>
      </table>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <input type="submit" class="btn btn-primary" value="修改完成!" onclick="return c_submitt_<? echo $record1[0];?>()"></div></div></form>
        </div></div></div>
   
    			<div class="col-sm col-md-6 col-lg-4 ftco-animate">
    				<div class="room">
    					<a href="rooms.html" class="img d-flex justify-content-center align-items-center" style="background-image: url(<? echo $record1[12]?>);">
    						<div class="justify-content-center align-items-center">
    						</div>
    					</a>
                           <div class="text p-3">
                               <h3 class="mb-3"><div style="float: right"><i style='font-size:16px' class='far' data-toggle="modal" data-target="#model<? echo $record1[0]?>">&#xf044;</i>&nbsp;&nbsp;<? echo "<a href=PM_del.php?method=delete&Project_ID=$record1[0]>" ?><i style='font-size:16px' class='far'>&#xf2ed;</i><? echo "</a>" ?></div><a href="rooms.html"><? echo $record1[2]?></a></h3>
                               <pp<? echo $record1[0]?>><img src="images/down.png" width="5%" class="btn<? echo $record1[0]?>"></pp<? echo $record1[0]?>>
                              <p<? echo $record1[0]?>><? echo $record1[11]?><br><img src="images/up.png" width="5%" class="bt<? echo $record1[0]?>"></p<? echo $record1[0]?>>
                               
    						<p><span class="price mr-2" id="price"><? echo $record1[7]?></span> <span class="per">每張照片</span></p>
                            
                            <p><i class='fas fa-map-marker-alt' id="area"></i>&nbsp;&nbsp;
                                <? echo $record1[5]?>&nbsp;&nbsp;&nbsp;
                                <i class='fas fa-image' id="tag"></i>&nbsp;&nbsp;
                                <? echo $record1[6]?></p>
                           
    						<hr>
                            <p class="pt-1">交易筆數：<? echo $record1[10]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;星等：<? echo $record1[9]?></p>
                        </div>
    				</div>
    			</div>
    			<?
    }
              
        }
        }
        ?>
              </div>
                </div>
       </div></div></section>

  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
<style>
.button1 {
    background-color:#6c757d;
    color: #6c757d;
    border: 2px solid white;
}
    .button1:hover {
    background-color: #6c757d;
    color: white;
}
.button {
    background-color: white;
    border-color: #6c757d;
    border-radius: 8px;
    color: #6c757d;
    padding: 10px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    cursor: pointer;
}
button, html [type="button"], [type="reset"], [type="submit"] {
    -webkit-appearance: button;
}
button, select {
    text-transform: none;
}
button, input {
    overflow: visible;
}
input, button, select, optgroup, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
button {
    border-radius: 0;
}
*, *::before, *::after {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
button {
    padding: 1px 6px;
}
button {
    align-items: flex-start;
    text-align: center;
    cursor: default;
    color: buttontext;
    background-color: buttonface;
    box-sizing: border-box;
    padding: 2px 6px 3px;
    border-width: 2px;
    border-style: outset;
    border-color: buttonface;
    border-image: initial;
}
button {
    text-rendering: auto;
    color: initial;
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;
    margin: 0em;
    font: 400 13.3333px Arial;
}
</style>