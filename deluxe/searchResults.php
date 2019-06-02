<?php
//需要解決的問題列表：
//篩選欄的問題：<1.價格篩選的值沒有接到 2.上一次篩選的記憶 <3.post 改成 get ok
//最後：判斷不同身分搜尋的身分：1.搜尋的表格不同 2.年資和工作室的按鈕會不會顯示
//一、消費者：1.發布的沒有年資
//二、攝影師：

session_start();
if(! isset($_SESSION["Mail"])){
  header("Location: Sign.php?");
  
}$mail=$_SESSION["Mail"];
$pon=$_SESSION["Provider_or_not"];
$rolesign=$_SESSION["role"]
//重上一個得到的值，這個帳號登入後就會存入。
//下面才會用到，判斷是不是攝影師
//$_SESSION[Provider_or_not] = 0;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>search results page</title>
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
      <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
      <link rel=stylesheet href="css/buttom.css">
      <link rel=stylesheet href="css/ul.css">
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
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="collection.html" class="nav-link">Collection</a></li>
	          <li class="nav-item"><a href="transaction.php" class="nav-link">Transcation</a></li>
              <li class="nav-item"><a href="MemberCenter.html" class="nav-link">Account</a></li>
              <li class="nav-item"><a href="Signin.html" class="nav-link"> <? if($_SESSION['Mail']){echo'<li class="nav-item"><a href="log-out.php" class="nav-link">Logout</a></li>';}?></a></li>
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
	             <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home</a></span> <span>Search Results </span></p>
	            <h1 class="mb-4 bread">Search Results Page</h1>
            </div>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section bg-light">
        
        
		
            
    	<div class="container">
            
    		<div class="row">
	        <div class="col-lg-9">
		    		<div class="row">
                        
                    <?//鏈結資料庫
                        
                        $link1=mysql_connect("localhost","root","");

                        mysql_query("set names utf8");
                        mysql_select_db("artsa",$link1);
                        
                        if($rolesign == 1){//pon從section得到的值，轉換為role去判斷專案發佈者應該的身分。
                            $role=2;
                        }else{
                            $role=1;
                        }
                        //$pon=$_SESSION["Provider_or_not"];//身分：消費者的時候

                        if(isset($_POST['area'])){
                        
                            if(!empty($_POST['priceone'])){
                                $priceone=$_POST['priceone'];
                            }else{
                                $priceone=0;
                            }

                            if(!empty($_POST['pricetwo'])){
                                $pricetwo=$_POST['pricetwo'];
                            }else{
                                $pricetwo=10000;
                            }


                            if(!empty($_POST['year'])){
                                $year=$_POST['year'];
                            }else{
                                $year=-1;
                            }

                            if(!empty($_POST['office'])){
                                $office=$_POST['office'];
                            }else{
                                $office=">-1";

                            }

                             $area=$_POST['area'];//地區

                             $tag=$_POST['tag'];//類別




                             $data=mysql_query("
                             select * from Project 
                             where Area like '%$area%' 
                             and Tag like '%$tag%' 
                             and role = '$role'
                             and Price > '$priceone' 
                             and Price < '$pricetwo' 
                             and 2019 - Year >= '$year'
                             and Office_or_not $office
                             "); //篩選條件：地區、類別、價格、年份
                                //Price 資料庫的值

                           
                        }else{
                         $data=mysql_query("
                         select * 
                         from Project 
                         where role ='$role'" );
                        }
                        
                //}
                //if($_SESSION[Provider_or_not]=1){//身分：攝影師的時候
                        

                        while($rs=mysql_fetch_row($data)){
                            
                            
                        ?>
                        
		    			<div id="<?php echo $rs[0]?>" class="col-sm col-md-6 col-lg-4 ftco-animate">
                        
						
		    				<div class="room">
		    					<a id="SceneryPicture" href="project information P.php" class="img d-flex justify-content-center align-items-center" style="background-image: url(<? echo $rs[12]?>);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<style>
                            .like{ font-size:25px;  color:#ccc; cursor:pointer;}
                            .cs{color:#f00;}
                        </style>  
                        
    					<div class="text p-3 text-center">
    						<h3 class="mb-3"><a id="title" href="project information P.php"><?php echo $rs[2]?></a><span style="float: right" class="like">&#10084;</span></h3>
    						<p id="price"><span id="price"class="price mr-2">$<?php echo $rs[7]?></span> <span class="per">每張照片</span></p>
                            
                            <p><i class='fas fa-map-marker-alt' ></i>&nbsp;&nbsp;
                                <span id="area"><?php echo $rs[5]?></span>&nbsp;&nbsp;&nbsp;
                                <i id="tab" class='fas fa-image'></i>&nbsp;&nbsp;<?php echo $rs[6]?></p>
                            <p>
                                <i class='fas fa-star'></i>&nbsp;
                                <i class='fas fa-star'></i>&nbsp;
                                <i class='fas fa-star'></i>&nbsp;
                                <i class='fas fa-star'></i>&nbsp;
                                <i class='far fa-star'></i>
                                <a href="">(4.3)</a>
                            </p>
    						<hr>
                            <p class="pt-1"><i class='fas fa-user-circle'></i>&nbsp;&nbsp;
                                <span class="per" id="name">
                                    <?php echo $rs[3] ?><?php echo $rs[4] ?>&nbsp;&nbsp;</span><!-- 發布專案人的名字 -->
                                <?//php 
                                   echo "<span class='per' id='year'>";
                                
                                    if($rolesign == 2){
                                        
                                        $date = date("Y");//取得年份（相減）
                                        $yy=$date-$rs[8];
                                        echo "$yy 年";

                                    }else{//消費者沒有年份
                                    }
                                echo "</span>";
                                ?>
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="per" id="anount">交易筆數：<?php echo $rs[10]?></span></p>
    					</div>
		    				</div>
		    			</div>
                        <?
                        
                        }
                        ?>
		    		</div>
		    	</div>
                <!-- 搜尋條件 -->
                                  
                
		    	<div class="col-lg-3 sidebar">
	      		<div class="sidebar-wrap bg-light ftco-animate">
	      			<h3 class="heading mb-4">搜尋條件</h3>
	      			<form method="post">
	      				<div class="fields">
                            <!--
                            <div class="form-group">
                            <div style="display:inline; width: 100%" class="person";margin-left:100px;float:rigtht;>
                                <button id="buttonP"class="button button1" onclick="cPerson(event, 'Provider')">Photographer</button>
                                <button id="buttonU" class="button button1" onclick="cPerson(event, 'User')">consumer</button>
                                <p><p>
                            </div>
                            </div>
                             測試 -->
                                
                            
                            
                    <div id="cPrice"class="form-group">
                        <div class="select-wrap one-third" >
		                <p>價格：
                            <input name="priceone" id="priceone" style="border: #fff 0px solid;height: 45px;width: 25%" type="text" placeholder="price" value="<?php
                            if(isset($_POST["priceone"])){echo $_POST["priceone"]; } ?>">
                            &nbsp;&nbsp;～&nbsp;&nbsp;
                            <input name="pricetwo" id="pricetwo" style="border: #fff 0px solid;height: 45px;width: 25%" type="text" placeholder="price" value="<?php 
                            if(isset($_POST["pricetwo"])){echo $_POST["pricetwo"];}?>">
                        </p>
                        </div>
                        
		              </div>
                           
                            
		              <div id="cArea"class="form-group">
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                    <select name="area" id="area" class="form-control">
	                    	<option name="area"  id="area" value="">地區</option>
	                    	<option name="area"  id="area" value="台北"<? if (isset($_POST["area"]) and $_POST["area"] == "台北"){echo "SELECTED";}?>>台北</option>
                            <option name="area"  id="area" value="新北"<? if (isset($_POST["area"]) and $_POST["area"] == "新北"){echo "SELECTED";}?>>新北</option>
	                        <option name="area"  id="area" value="雲林"<? if (isset($_POST["area"]) and $_POST["area"] == "雲林"){echo "SELECTED";}?>>雲林</option>
                            <option name="area"  id="area" value="台南"<? if (isset($_POST["area"]) and $_POST["area"] == "台南"){echo "SELECTED";}?>>台南</option>
                            <option name="area"  id="area" value="高雄" <? if (isset($_POST["area"]) and $_POST["area"] == "高雄"){echo "SELECTED";}?>>高雄</option>
	                    </select>
	                  </div>
		              </div>
                            
                            
		              <div id="cTag"class="form-group">
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                    <select name="tag" id="tag" class="form-control">
	                    	<option name="tag" id="tag" value="">類別</option>
	                    	<option name="tag"id="tag" value="風景"<? if (isset($_POST["tag"]) and $_POST["tag"] == "風景"){echo "SELECTED";}?>>風景</option>
	                      <option name="tag" id="tag" value="人像"<? if (isset($_POST["tag"]) and $_POST["tag"] == "人像"){echo "SELECTED";}?>>人像</option>
	                      <option name="tag" id="tag" value="美食"<? if (isset($_POST["tag"]) and $_POST["tag"] == "美食"){echo "SELECTED";}?>>美食</option>
                            <option name="tag" id="tag" value="商品"<? if (isset($_POST["tag"]) and $_POST["tag"] == "商品"){echo "SELECTED";}?>>商品</option>
                            <option name="tag" id="tag" value="動物"<? if (isset($_POST["tag"]) and $_POST["tag"] == "動物"){echo "SELECTED";}?>>動物</option>
	                    </select>
	                  </div>
		              </div>
                           

                    
                        
                        
		              <div id="cYear"class="form-group">
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                    <select name="year" id="year" class="form-control">
	                    	<option name="year" value="">資歷</option>
	                    	<option name="year" value="3"<? if (isset($_POST["year"]) and $_POST["year"] == "三年以上"){echo "SELECTED";}?>>三年以上</option>
	                      <option name="year" value="5"<? if (isset($_POST["year"]) and $_POST["year"] == "五年以上"){echo "SELECTED";}?>>五年以上</option>
	                    </select>
	                  </div>
		              </div>
					  <p>
                    <!-- 工作室的沒有在專案裡面 -->
					  <div id="cOffice"class="form-group">
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                    <select name="office" id="yesno" class="form-control">
	                    	<option name="office" value="">工作室</option>
	                    	<option name="office" value="=1"<? if (isset($_POST["office"]) and $_POST["office"] == "是"){echo "SELECTED";}?>>是</option>
	                        <option name="office" value="=0"<? if (isset($_POST["office"]) and $_POST["office"] == "否"){echo "SELECTED";}?>>否</option>
	                    </select>
	                  </div>
		              </div>
                
                            <p>
                              
		              <div class="form-group">
		                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
		              </div>
		            </div>
	            </form>
	      		</div>
	        </div>
                <!-- 搜尋條件 -->
		    </div>
    	</div>
    </section>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


      

      
<script language="javascript">
    <?
    if($rolesign == 2){
        echo "window.onload=cPerson(event,'User');";
    }else{
        echo "window.onload=cPerson(event,'Provider');";
    }
    ?>/*網頁開啟的時候自動設定為消費者升幅*/

    
function cPerson(evt, personName) {
         <?
    if($rolesign == 2){
        echo "personName == 'Provider';";
   }else{
        echo "personName == 'User';";
    }?>
		console.log(personName);
        
		if(personName == "Provider")/*消費者：攝影師發布的專案*/
		{
            
            document.getElementById("cYear").style.display = "none";
            document.getElementById("cOffice").style.display = "none";
			console.log("Provider");
		}
		if(personName == "User")/*攝影師：消費者發布的專案*/
		{
            
            document.getElementById("cYear").style.display = "unset";
            document.getElementById("cOffice").style.display = "unset";
			console.log("User");
		}
	}
</script>


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
