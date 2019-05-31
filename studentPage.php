 <?php
session_start();?>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<style>
$(document).ready(function() {
    $("div.bhoechie-tab-menu>ul.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
.fullscreen_bg {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: 50% 50%;
    background-image: url('http://blog.transfer-iphone-recovery.com/images/photo-with-blur-background.jpg');
    background-repeat:repeat;
  }
/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 20px;
  margin-left: 50px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu ul.list-group{
  margin-bottom: 0;
  list-style:none;
}
div.bhoechie-tab-menu ul.list-group>a{
  margin-bottom: 0;
  text-align:left;
}
div.bhoechie-tab-menu ul.list-group>a .glyphicon,
div.bhoechie-tab-menu ul.list-group>a .fa {
  color: #00001a;
}
div.bhoechie-tab-menu ul.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu ul.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu ul.list-group>a.active,
div.bhoechie-tab-menu ul.list-group>a.active .glyphicon,
div.bhoechie-tab-menu ul.list-group>a.active .fa{
  background-color: #004c99;
  background-image: #5A55A3;
  color: #ffffff;
}
div.bhoechie-tab-menu ul.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #5A55A3;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
</style>
<body>
<div id="fullscreen_bg" class="fullscreen_bg"/>
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-8 col-xs-9 bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <ul class="list-group">
                <a href="" class="list-group-item active">
                  <br/><br/><i class="glyphicon glyphicon-home"></i> Home<br/><br/>
                  </a>
                			
                <a href="lendItem.php" class="list-group-item ">
                  <br/><br/><i class="glyphicon glyphicon-transfer"></i> Lend Item<br/><br/>
                </a>
				 <a href="borrowItem.php" class="list-group-item ">
                  <br/><br/><i class="glyphicon glyphicon-transfer"></i> Borrow Item <br/><br/>
                </a>
				<a href="borrowedItems.php" class="list-group-item ">
                  <br/><br/><i class="glyphicon glyphicon-transfer"></i> Borrowed Items <br/><br/>
                </a>
				 <a href="lendedItems.php" class="list-group-item">
                  <br/><br/><h4 class="glyphicon glyphicon-wrench"></h4> Lended Items <br/><br/>
                </a>
		
                <a href="updatePersonalInformation.php" class="list-group-item">
                  <br/><br/><h4 class="glyphicon glyphicon-wrench"></h4> Edit My Information<br/><br/>
                </a>
              </ul>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                
                <div class="bhoechie-tab-content active">
                    <center>
                      <h1 class="glyphicon glyphicon-user" style="font-size:14em;color:#00001a"></h1>
                      <h2 style="margin-top: 0;color:#00001a">Welcome</h2>
                      <h3 style="margin-top: 0;color:#00001a">Dorm Exchange HomePage</h3><br>
					  <h3 style="margin-top: 0;color:#F08080"><?php echo $_SESSION["firstname"];?></h3>
					   <h3 style="margin-top: 0;color:#F08080"><?php echo $_SESSION["lastname"];?></h3>
					  <?php

echo "<br><br>";

echo "<a href='logOut.php'><p style='text-align:right' >Log Out</p></a> ";?>
                    </center>
                </div>
              
              
            </div>
        </div>
  </div>
</div>
</body>
</html>