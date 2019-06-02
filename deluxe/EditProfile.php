<?php
session_start();
if(! isset($_SESSION['Mail'])){
    header("Location:Sign.php");
}
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
    <link rel="stylesheet" href="css/VerticalTabStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

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
                  document.getElementById("logout").innerHTML = "<a href='./PHP.log-out.php' class='nav-link'>Logout</a>"
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
            <li class="nav-item  active"><a href="MemberCenter.html" class="nav-link">Account</a></li>
            <li class="nav-item" id="logout"></li>
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
               <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>編輯基本資料</span></p>
              <h1 class="mb-4 bread">編輯基本資料</h1>
            </div>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section bg-light">
   
    <div>
      <div class="container"> 
        <div class="row">
          <div class="col-lg-9" style="left: 20%;">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'Profile')">基本資料</button>
              <button class="tablinks" onclick="openCity(event, 'Account')">帳號管理</button>
            </div>
            <div id="Profile" class="tabcontent" style="display: inline;">
              <div class="borderstyle">
                <br>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;姓&nbsp;&nbsp;&nbsp;&nbsp;名&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <label id = "name" style="display: inline;">Andy Liu</label><label><input id="EditName" type="text" value="Andy Liu" name="請輸入姓名" style="display: none"></label>
                <div style="float: right" id="EditNamebt"><a href="#" onclick="edit('Name')"><i style='font-size:16px' class='far' data-toggle="modal" data-target="#modell">&#xf044;</i></a>&nbsp;&nbsp;</div>
                <div id="NameCheck" style="float: right; display: none;"><a href="#" id="NameCheckbt" onclick="update('Name')"><i style='font-size:16px' class="fas" data-toggle="modal" data-target="#modell">&#xf00c;</i></a>&nbsp;&nbsp;<a href="#" id="NameCanclebt" onclick="update('NameCancle')"><i style='font-size:16px' class='fa' data-toggle="modal" data-target="#modell">&#xf00d;</i></a>&nbsp;&nbsp;</div>
              </div>
              <div class="borderstyle">
                <br>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;電&nbsp;&nbsp;&nbsp;&nbsp;話&nbsp;&nbsp;&nbsp;&nbsp;</label><label id="Phone" style="display: inline;">0912345678</label>
                <label><input id="EditPhone" type="text" value="0912345678" name="請輸入姓名" style="display: none"></label>
                <div style="float: right"; id="EditPhonebt"><a href="#" onclick="edit('Phone')"><i style='font-size:16px' class='far' data-toggle="modal" data-target="#modell">&#xf044;</i></a>&nbsp;&nbsp;</div>
                 <div id="PhoneCheck" style="float: right;display: none;"><a href="#" id="PhoneCheckbt" onclick="update('Phone')"><i style='font-size:16px' class='fas' data-toggle="modal" data-target="#modell">&#xf00c;</i></a>&nbsp;&nbsp;<a href="#" id="PhoneCanclebt" onclick="update('PhoneCancle')"><i style='font-size:16px' class='fa' data-toggle="modal" data-target="#modell">&#xf00d;</i></a>&nbsp;&nbsp;</div>
              </div>
              <div class="borderstyle">
                <br>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;生&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;&nbsp;</label><label id="Birthday" style="display: inline;">1998-01-01</label>
                <label><input id="EditBirthday" type="text" value="1998-01-01" name="請輸入姓名" style="display: none"></label>
                <div style="float: right" id="EditBirthdaybt"><a href="#" onclick="edit('Birthday')"><i style='font-size:16px' class='far' data-toggle="modal" data-target="#modell">&#xf044;</i></a>&nbsp;&nbsp;</div>
                <div id="BirthdayCheck" style="float: right;display: none;"><a href="#" id="BirthdayCheckbt" onclick="update('Birthday')"><i style='font-size:16px' class='fas' data-toggle="modal" data-target="#modell">&#xf00c;</i></a>&nbsp;&nbsp;<a href="#" id="BirthdayCanclebt" onclick="update('BirthdayCancle')"><i style='font-size:16px' class='fa' data-toggle="modal" data-target="#modell">&#xf00d;</i></a>&nbsp;&nbsp;</div>
              </div>
            </div>

            <div id="Account" class="tabcontent">
              <div class="borderstyle">
                <br>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;電子郵件&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <label id = "Mail" style="display: inline;">abc@gamil.com</label><label><input id="EditMail" type="text" value="abc@gamil.com" name="請輸入電子郵件" style="display: none"></label>
                <div style="float: right" id="EditMailbt"><a href="#" onclick="edit('Mail')"><i style='font-size:16px' class='far' data-toggle="modal" data-target="#modell">&#xf044;</i></a>&nbsp;&nbsp;</div>
                <div id="MailCheck" style="float: right; display: none;"><a href="#" id="MailCheckbt" onclick="update('Mail')"><i style='font-size:16px' class="fas" data-toggle="modal" data-target="#modell">&#xf00c;</i></a>&nbsp;&nbsp;<a href="#" id="MailCanclebt" onclick="update('MailCancle')"><i style='font-size:16px' class='fa' data-toggle="modal" data-target="#modell">&#xf00d;</i></a>&nbsp;&nbsp;</div>
              </div>
               <div class="borderstyle">
                <br>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碼&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><label id="Password" style="display: inline;">已設定</label>
                <div id="EditPassword" style="display: none;">
                  <label>舊密碼&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="EditOldPassword" type="password" name="舊密碼" style="display: none"></label>
                  <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;新密碼&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="EditNewPassword" type="password" name="新密碼" style="display: none"></label>
                  <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;確認密碼&nbsp;&nbsp;&nbsp;<input id="CheckNewPassword" type="password" name="確認新密碼" style="display: none"></label>
                </div>
                <div style="float: right"; id="EditPasswordbt"><a href="#" onclick="edit('Password')"><i style='font-size:16px' class='far' data-toggle="modal" data-target="#modell">&#xf044;</i></a>&nbsp;&nbsp;</div>
                 <div id="PasswordCheck" style="float: right;display: none;"><a href="#" id="PasswordCheckbt" onclick="update('Password')"><i style='font-size:16px' class='fas' data-toggle="modal" data-target="#modell">&#xf00c;</i></a>&nbsp;&nbsp;<a href="#" id="PasswordCanclebt" onclick="update('PasswordCancle')"><i style='font-size:16px' class='fa' data-toggle="modal" data-target="#modell">&#xf00d;</i></a>&nbsp;&nbsp;</div>
              </div>
              <div class="borderstyle">
                <br>
                <label>&nbsp;&nbsp;&nbsp;&nbsp;身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <label id = "Identity" style="display: inline;">消費者</label>
                <label>
                  <div class="col-md-2 d-flex">
                    <div >
                      <a href="./Profile.html"><input type="submit" value="申請為攝影師" class="btn btn-primary pybt align-self-stretch"></a>
                    </div>
                  </div>
              </label>
                <div id="MailCheck" style="float: right; display: none;"><a href="#" id="MailCheckbt" onclick="update('Mail')"><i style='font-size:16px' class="fas" data-toggle="modal" data-target="#modell">&#xf00c;</i></a>&nbsp;&nbsp;<a href="#" id="MailCanclebt" onclick="update('MailCancle')"><i style='font-size:16px' class='fa' data-toggle="modal" data-target="#modell">&#xf00d;</i></a>&nbsp;&nbsp;</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<!--小卡片的內容-->
<script>
  function openCity(evt, cityName) {
  // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  function edit(category)
  {
    var value;
    console.log(category);
    if(category == 'Name')
    {
        document.getElementById('name').style.display = "none";
        document.getElementById('EditName').style.display = "inline";
        document.getElementById('EditNamebt').style.display = "none"
        document.getElementById('NameCheck').style.display = "inline";
        $.ajax({
              url:"/EditProfile.html",  
              type:"POST",
              data:{},
              dataType:"json",
              success:function(data)
              {
                console.log("good");
              }
            })
    }
    if(category == 'Phone')
    {
        document.getElementById('Phone').style.display = "none";
        document.getElementById('EditPhone').style.display = "inline";
        document.getElementById('EditPhonebt').style.display = "none";
        document.getElementById('PhoneCheck').style.display = "inline";
       $.ajax({
              url:"/EditProfile.html",  
              type:"POST",
              data:{},
              dataType:"json",
              success:function(data)
              {
                console.log("good");
              }
            })
    }
    if(category == 'Birthday')
    {
        document.getElementById('Birthday').style.display = "none";
        document.getElementById('EditBirthday').style.display = "inline";
        document.getElementById('EditBirthdaybt').style.display = "none"
        document.getElementById('BirthdayCheck').style.display = "inline";
    }
    if(category == 'Mail')
    {
        document.getElementById('Mail').style.display = "none";
        document.getElementById('EditMail').style.display = "inline";
        document.getElementById('EditMailbt').style.display = "none"
        document.getElementById('MailCheck').style.display = "inline";
    }
    if(category == 'Password')
    {
        document.getElementById('Password').style.display = "none";
        document.getElementById('EditPassword').style.display = "inline";
        document.getElementById('EditOldPassword').style.display = "inline";
        document.getElementById('EditNewPassword').style.display = "inline";
        document.getElementById('CheckNewPassword').style.display = "inline";
        document.getElementById('EditPasswordbt').style.display = "none"
        document.getElementById('PasswordCheck').style.display = "inline";
    }
  }
  function update(category)
  {
    var value;
    if(category == 'Name' || category == 'NameCancle')
    {
      if(category == 'Name')
      {
        value = document.getElementById('EditName').value;
        document.getElementById('name').innerHTML = "<label id = 'name' style='display: inline;''>"+value+"</label>";
      }
        document.getElementById('name').style.display = "inline";
        document.getElementById('EditName').style.display = "none";
        document.getElementById('EditNamebt').style.display = "inline"
        document.getElementById('NameCheck').style.display = "none";
    }
    if(category == 'Phone' || category == 'PhoneCancle')
    {
      if(category == 'Phone')
      {
        value = document.getElementById('EditPhone').value;
        document.getElementById('Phone').innerHTML = "<label id = 'Phone' style='display: inline;''>"+value+"</label>";
      }
        document.getElementById('Phone').style.display = "inline";
        document.getElementById('EditPhone').style.display = "none";
        document.getElementById('EditPhonebt').style.display = "inline"
        document.getElementById('PhoneCheck').style.display = "none";
    }
    if(category == 'Birthday' || category == 'BirthdayCancle')
    {
      if(category == 'Birthday')
      {
        value = document.getElementById('EditBirthday').value;
        document.getElementById('Birthday').innerHTML = "<label id = 'Birthday' style='display: inline;''>"+value+"</label>";
      }
        document.getElementById('Birthday').style.display = "inline";
        document.getElementById('EditBirthday').style.display = "none";
        document.getElementById('EditBirthdaybt').style.display = "inline"
        document.getElementById('BirthdayCheck').style.display = "none";
    }
    if(category == 'Mail' || category == 'MailCancle')
    {
      if(category == 'Mail')
      {
        value = document.getElementById('EditMail').value;
        document.getElementById('Mail').innerHTML = "<label id = 'Mail' style='display: inline;''>"+value+"</label>";
      }
        document.getElementById('Mail').style.display = "inline";
        document.getElementById('EditMail').style.display = "none";
        document.getElementById('EditMailbt').style.display = "inline"
        document.getElementById('MailCheck').style.display = "none";
    }
     if(category == 'Password' || category == 'PasswordCancle')
    {
        document.getElementById('Password').innerHTML = "<label id='Password' style='display: inline;''>已設定</label>";
        document.getElementById('Password').style.display = "inline";
        document.getElementById('EditPassword').style.display = "none";
        document.getElementById('EditPasswordbt').style.display = "inline"
        document.getElementById('PasswordCheck').style.display = "none";
        document.getElementById('EditOldPassword').style.display = "none";
        document.getElementById('EditNewPassword').style.display = "none";
        document.getElementById('CheckNewPassword').style.display = "none";
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