<?php
session_start();
if(! isset($_SESSION["Mail"])){
  header("Location: Sign.php?");
}$mail=$_SESSION["Mail"];
$pon=$_SESSION["Provider_or_not"];
$rolesign=$_SESSION["role"];

//重上一個得到的值，這個帳號登入後就會存入。
//下面才會用到，判斷是不是攝影師
//$_SESSION[Provider_or_not] = 0;
?>
<!DOCTYPE html>

<html lang="en">
    
  <head>
    <title>ARTSA</title>
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
    
     
      <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
      <link rel=stylesheet href="css/buttom.css">
      <link rel=stylesheet href="css/ul.css">
      
  </head>
   
  <body onload="myfunction()"><!--按下攝影師-->

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">ARTSA</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">

	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="collection.html" class="nav-link">Collection</a></li>
	          <li class="nav-item"><a href="transaction.php" class="nav-link">Transcation</a></li>
              <li class="nav-item"><a href="MemberCenter.html" class="nav-link">Account</a></li>
              <?if($_SESSION['Mail']){echo'<li class="nav-item"><a href="log-out.php" class="nav-link">Logout</a></li>';}?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Welcome To ARTSA</h1>
	            <h2>Photographer &amp; Customer</h2>
            </div>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Enjoy A Photography Experience</h1>
	            <h2>Join With Us</h2>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
      
      <!--搜尋條件欄-->
    <section class="ftco-booking">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12">
    				<form action="#" class="booking-form">
	        		<div class="row">
                       
                    <div class="col-md-3 d-flex">
	        			<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        			    <div class="wrap">
			      			<label for="#">地區</label>
			                 <div class="form-field">
			        			<div class="select-wrap">
                                            
                                <ul class="drop-down-menu">
                                            <li>請選擇&nbsp;<div class="arrow-bottom"></div>
                                            <ul>
                                            <li><input type="checkbox" name="area" value="Taibei">&nbsp;&nbsp;台北<br></li>
                                            <li><input type="checkbox" name="area" value="Taizhong">&nbsp;&nbsp;台中<br></li>
                                            <li><input type="checkbox" name="area" value="Kaoxiong">&nbsp;&nbsp;高雄<br></li>
                                            </ul>
                                            </li>
                                    </ul>
			                     </div>
				                </div>
				            </div>
		                  </div>
	        			</div>
                        
	        			<div class="col-md-3 d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        			        <div class="wrap">
			      			    <label for="#">類別</label>
			      			    <div class="form-field">
			        					<div class="select-wrap">
                                            <ul class="drop-down-menu">
                                                <li>請選擇&nbsp;<div class="arrow-bottom"></div>
                                            <ul>
                                                <li><input type="checkbox" name="tag" value="People">&nbsp;&nbsp;人像<br></li>
                                                <li><input type="checkbox" name="tag" value="Product">&nbsp;&nbsp;商品<br></li>
                                                <li><input type="checkbox" name="tag" value="Animal">&nbsp;&nbsp;動物<br></li>
                                                <li><input type="checkbox" name="tag" value="Food">&nbsp;&nbsp;美食<br></li>
                                                <li><input type="checkbox" name="tag" value="View">&nbsp;&nbsp;風景<br></li>
                                            </ul>
                                                </li>
                                            </ul>
			                             </div>
				                    </div>
				                </div>
		                  </div>
	        			</div>
                       
                       
	        			<div class="col-md d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
			      					<label for="#">關鍵字搜尋</label>
			      					<div class="form-field">
			        					<div class="select-wrap" >
			                                 <input style="border: #fff 0px solid;height: 45px;width: 100%" type="text" name="Search" placeholder="輸入你想查詢的關鍵字">
			                             </div>
				                    </div>
				            </div>
		              </div>
	        			</div>
	        			
	        			<div class="col-md-2 d-flex">
	        				<div class="form-group d-flex align-self-stretch">
                                <input type="button" class="btn btn-primary py-3 px-4 align-self-stretch" value="Search" onclick="location.href='searchResults.php'">
			                </div>
	        			</div>
                        
	        			
	        		</div>
	        	</form>
	    		</div>
    		</div>
    	</div>
    </section>
      <!--搜尋條件欄-->

      
    <section class="ftco-section bg-light">
    	<div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Our Project</h2>
                </div>
            </div>
            
            <?//鏈結資料庫
                        
                $link1=mysql_connect("localhost","root","");
   
                mysql_query("set names utf8");
                mysql_select_db("artsa",$link1);
                
                if($rolesign == 1){
                    $role=2;
                }else{
                    $role=1;
                }
            
            
            
                $data=mysql_query("select * from Project where role = '$role'");//從（資料表）中選區；select（欄位）from（表格）

            ?>
            
    		<div class="row">
                <!-- 卡片列印 -->
                <?
                for($i=1;$i<=mysql_num_rows($data);$i++){
                    $rs=mysql_fetch_row($data);
                ?>
    			<div id="<? echo $rs[0]?>" class="col-sm col-md-6 col-lg-4 ftco-animate">
    				<div class="room">
    					<a id="onePicture" href="project information P.php" class="img d-flex justify-content-center align-items-center" style="background-image: url(<? echo $rs[12]?>);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					
                        <!-- 愛心 -->
    					<style>
                            .like{ font-size:25px;  color:#ccc; cursor:pointer;}
                            .cs{color:#f00;}
                        </style>
                        <!-- 愛心 -->
                        
 
    					<div class="text p-3 text-center">
    						<h3 class="mb-3"><a id="title" href="project information P.php"><?php echo $rs[2]?></a><span style="float: right" class="like">&#10084;</span></h3>
    						<p id="price"><span class="price mr-2">$<?php echo $rs[7]?></span> <span class="per">每張照片</span></p>
                            
                            <p><i class='fas fa-map-marker-alt' ></i>&nbsp;&nbsp;
                                <span id="area"><?php echo $rs[5]?></span>&nbsp;&nbsp;&nbsp;
                                <i id="tab" class='fas fa-image'></i>&nbsp;&nbsp;
                                <?php echo $rs[6]?></p>
                            <p>
                                <i class='fas fa-star'></i>&nbsp;
                                <i class='fas fa-star'></i>&nbsp;
                                <i class='fas fa-star'></i>&nbsp;
                                <i class='fas fa-star'></i>&nbsp;
                                <i class='far fa-star'></i>
                                <a href="">(4.3)</a>
                            </p>
    						<hr>
                            <p class="pt-1"><i class='fas fa-user-circle'></i>&nbsp;&nbsp;<?php echo $rs[3]?><?php echo $rs[4] ?>&nbsp;&nbsp;<span class="per"><?//php 
                                   echo "<span class='per' id='year'>";
                                
                                    if($rolesign == 1){
                                        
                                        $date = date("Y");//取得年份（相減）
                                        $yy=$date-$rs[8];
                                        echo "$yy 年";

                                    }else{//消費者沒有年份
                                    }
                                echo "</span>";
                                ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交易筆數：<?php echo $rs[10]?></p>
    					</div>
    				</div>
    			</div>
                <?php
                }
                ?>
                <!-- 第一個卡片結束 -->
                
                
                
                <!-- 更多資訊：搜尋結果 -->
                <div class="d-flex justify-content-center" style="width: 100%">
                    <a href="searchResults.php"><input type="button" value="更多資訊" class="btn btn-primary py-3 px-4"></a>
    		    </div>
                <!-- 更多資訊：搜尋結果 -->
                                                
                
                
               
                
    	    </div>
        </div>
    </section>
      <!-- 數據欄 -->
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="50000">0</strong>
		                <span>Guests</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="3000">0</strong>
		                <span>Project</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="10000">0</strong>
		                <span>Photographer</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Transcation</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>
      <!-- 數據欄 -->

      <!-- 排名5名的攝影師 -->
    <section class="ftco-section testimony-section bg-light" >
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Top 5 Photographer</h2>
          </div>
        </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 ftco-animate">
          	<div class="row ftco-animate">
                
		          <div class="col-md-12">
		            <div class="carousel-testimony owl-carousel ftco-owl">
                        
		              <div class="item">
		                <div class="testimony-wrap py-4 pb-5">
                            
		                  <div class="user-img mb-4" style="background-image: url(images/lala.png)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text text-center">
		                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		                    <p class="name">lala</p>
		                    <span class="position">Photographer</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap py-4 pb-5">
		                  <div class="user-img mb-4" style="background-image: url(images/dingding%20.jpeg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text text-center">
		                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		                    <p class="name">dingding</p>
		                    <span class="position">Photographer</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap py-4 pb-5">
		                  <div class="user-img mb-4" style="background-image: url(images/dixi.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text text-center">
		                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		                    <p class="name">dixi</p>
		                    <span class="position">Photographer</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap py-4 pb-5">
		                  <div class="user-img mb-4" style="background-image: url(images/xiaobo.jpeg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text text-center">
		                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		                    <p class="name">xiaobo</p>
		                    <span class="position">Photographer</span>
		                  </div>
		                </div>
		              </div> 
		              <div class="item">
		                <div class="testimony-wrap py-4 pb-5">
		                  <div class="user-img mb-4" style="background-image: url(images/taiyang.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text text-center">
		                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		                    <p class="name">sun</p>
		                    <span class="position">Photographer</span>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section>
      <!-- 排名5名的攝影師 -->



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
   
   
   <script typet="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(function () {            
            $(".like").click(function () {
                $(this).toggleClass('cs');                
            })
        })
    </script>
    
  </body>
</html>