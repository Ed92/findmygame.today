<?php 
	require_once 'actions/db_connect.php';
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Findmygame - Your number 1 platform for gamers from gamers!</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<!-- Custom Theme files -->
<link href="css/style1.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Game Box  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="js/jquery.min.js"></script>

</head>
<body>
<!-- header -->
<div class="top-banner">
	 <!--<div class="header">
		 <div class="container">
			 <div class="headr-left">
				 <div class="social">							
						<p style="color: white;">Find my Game Today</p>
				 </div>
				 <div class="clearfix"></div>
			 </div>
			 <div class="headr-right">
				 <div class="details">
					 <ul>
						 <li><a href="mailto@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>info@findmygame.today</a></li>
					 </ul>
				 </div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div> -->
	 <!--banner-info-->	
	 <div class="banner-info">
		  <div class="container">
			  <div class="logo">
					 <h1><a href="index.html">Find my Game Today</a></h1>
			  </div>
			 <div class="top-menu">
				 <span class="menu"></span>
					<ul class="nav1">
						 <li class="active"><a href="index.php">Home</a></li>
                         <li><a href="about.html">About</a></li>
                         <li><a href="groups.php">Groups</a></li>
                         <li><a href="profile.php">Profile</a></li>
                         <li><a href="logout.php?logout">Log Out</a></li>
				  </ul>
			 </div>	
	 <!-- script-for-menu -->
						<script>
							 $( "span.menu" ).click(function() {
							$( "ul.nav1" ).slideToggle( 300, function() {
							// Animation complete.
								});
								});
						</script>
					<!-- /script-for-menu -->
			 
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!-- banner -->
	 <!-- Slider-starts-Here -->
	 <script src="js/responsiveslides.min.js"></script>
	 <script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto:true,
			nav: false,
			speed: 500,
			namespace: "callbacks",
			pager:true,
		  });
		});
		
	   </script>
	 <div class="slider">
		  <div class="callbacks_container">
			  <ul class="rslides" id="slider">
				
					<div class="slid banner1">
						  <div class="caption">
								<h3>Create your own Group</h3>
								<p>Create a team, play in your groups, create connections.</p>
						  </div>
					</div>
				
				
					 <div class="slid banner2">	
						  <div class="caption">
								<h3>Strengthen your skills</h3>
								<p>Create a team, play in your groups, create connections.</p>
						  </div>
					 </div>
				
				
					<div class="slid banner3">	
						<div class="caption">
							<h3>Be resepectful to your other group members.</h3>
							<p>Create a team, play in your groups, create connections.</p>
						</div>
					</div>
				
			  </ul>
		 </div>
	 </div>

<!-- content -->
<div class="content" style="background-color:white>
	 <div class="container">
		<div class='row'>
			<?php
	            $sql = "SELECT * FROM groups";
	            $result = $conn->query($sql);

	            if($result->num_rows > 0) {
	                while($row = $result->fetch_assoc()) {
	                    echo "
	                    		<div class='col-md-4 col-lg-4 col-4'>
	                    			<h1>
	                    				".$row['group_name']."
	                    			</h1>
	                    			<h4>".$row['scheduling']."</h4>
	                    			<h4>".$row['target_audience']."</h4>
	                    			<p>".$row['description']."</p>
	                    			<span>".$row['open_spots']."</span>
									
									<a href='update.php?id=".$row['groups_id']."'><button type='button'>Edit</button></a>
	                            	<a href='delete.php?id=".$row['groups_id']."'><button type='button'>Delete</button></a>
	                    		</div>

	                            ";
	                }
	            } else {
	               echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
	            }
	        ?>
	        <div style="float: right; flex-wrap: wrap; display: flex-wrap">
	        	
	        <script id="cid0020000182096925487" data-cfasync="false" async src="http://st.chatango.com/js/gz/emb.js" style="width: 250px;height: 350px;">
    {
        "handle": "findmygame123",
        "arch": "js",
        "styles": {
            "a": "000066",
            "b": 100,
            "c": "FFFFFF",
            "d": "FFFFFF",
            "k": "000066",
            "l": "000066",
            "m": "000066",
            "n": "FFFFFF",
            "p": "10",
            "q": "000066",
            "r": 100,
            "fwtickm": 1
        }
    }
</script></div>

	       </div>
	        <a href="create.php"><button type="button">Add New Group</button></a>

		 <div class="top-games">
			 <h3>Top Games</h3>
			 <span></span>
		 </div>
		 <div class="top-game-grids">
			 <ul id="flexiselDemo1">
				 <li>
					 <div class="game-grid">
						 <h4>Action Games</h4>
						 <img src="images/t1.jpg" class="img-responsive" alt=""/>
					 </div>	
				 </li>
				 <li>
					 <div class="game-grid">
						 <h4>Racing Games</h4>
						 <img src="images/t3.jpg" class="img-responsive" alt=""/>
					 </div>
				 </li>
				 <li>
					 <div class="game-grid">
						 <h4>3D Games</h4>
						 <img src="images/t4.jpg" class="img-responsive" alt=""/>
					 </div>
				 </li>
				 <li>
					 <div class="game-grid">
						 <h4>Arcade Games</h4>
						 <img src="images/t2.jpg" class="img-responsive" alt=""/>
					 </div>	
				 </li>				 				 	
			 </ul>
			 
			 <script type="text/javascript">
			 $(window).load(function() {			
			  $("#flexiselDemo1").flexisel({
				visibleItems: 4,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover:true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>	
		 </div>
	 </div>
</div>

<!-- poster -->
<div class="poster">
	 <div class="container">
		 <div class="poster-info">
			 <h3>News and Updates</h3>
			 <p>The newest news and updates on our website and popular groups!</p>
			  <a class="hvr-bounce-to-bottom" href="reviews.html">Read More</a>
		 </div>
	 </div>
</div>

<!-- footer -->
  <div class="footer">
        <div class="container">
            <div class="footer-grids">
                <div class="col-md-3 ftr-info">
                    <h3>About Us</h3>
                    <p>Find my game is platform to unite gamers and make it easier to find and join games.</p>
                </div>
                <div class="col-md-3 ftr-grid">
                    <h3>Categories</h3>
                    <ul class="ftr-list">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Racing</a></li>
                        <li><a href="#">Adventure</a></li>
                        <li><a href="#">Simulation</a></li>
                        <li><a href="#">Bike</a></li>
                    </ul>
                </div>
                <div class="col-md-3 ftr-grid">
                    <h3>Platform</h3>
                    <ul class="ftr-list">
                        <li><a href="#">PC</a></li>
                        <li><a href="#">PS4</a></li>
                        <li><a href="#">XBOX 360</a></li>
                        <li><a href="#">Wii</a></li>
                        <li><a href="#">PSP</a></li>
                    </ul>
                </div>
                <div class="col-md-3 ftr-grid">
                    <h3>Information</h3>
                    <ul class="ftr-list">
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="#">Site Map</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!---->
<div class="copywrite">
	 <div class="container">
		 <p> © 2015 Game Box. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
	 </div>
</div>
<!---->
</body>
</html>