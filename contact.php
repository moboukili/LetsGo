<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	
	<title>Contact | Let'sGo</title>
	
	<link rel="stylesheet" href="css/theme-lblue.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/css.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700">
	<link rel="shortcut icon" href="images/car.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body  onload="initialize()">
    <!-- Header -->
	<header class="header" role="banner">
			<div class="wrap">
				<!-- Logo -->
				<div class="logo">
					<a href="index.php" title="Let'sGo"><img src="images/cc.jpeg" alt="Let'sGo" /></a>
				</div>
				<!-- //Logo -->
				
				<!-- Main Nav -->
				<nav role="navigation" class="main-nav">
					<ul>
						<li class="active"><a href="search-results.php" title="Search results page"><b>Find a ride</b></a></li>
						<li><a href="booking-step2.php" title="Booking step "><b>Offer a ride</b></a></li>
						<li><b>|</b></li>
						<?php
						if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
						?>
						<li><a href="register.php" title="Register"><b>Sign up</b></a></li>
						<li><a href="login.php" title="Login"><b>Log in</b></a></li>
						<?php
                        } else {
                        	?>
                        	<div class="logo">
							   <div class="dropdown">
								  &nbsp;&nbsp;&nbsp;&nbsp;<img src="images/user5.png" onclick="myFunction()"alt="avatar" class="avatar">
								  <div id="myDropdown" class="dropdown-content">
								  	<a href="anonce.php">Rides offered</a>
								    <a href="profil.php">profil</a>
								    <a href="logout.php">Log Out</a>
								  </div>
								  	&nbsp;&nbsp;<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
								</div>
							  </div></ul></nav>	
                        	 <?php
                        }
                        ?>
						
						</ul>
			</div>
		</header>
	<!-- //Header -->
	
	<!-- Main -->
	<main class="main" role="main">
		<!-- Page info -->
		<header class="site-title color">
			<div class="wrap">
				<div class="container">
					<h1>Contact us</h1>
					<nav role="navigation" class="breadcrumbs">
						<ul>
							<li><a href="index.php" title="Home">Home</a></li>
							<li>Contact</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<!-- //Page info -->
		
		<!--- Google map -->
		<div id="map_canvas" class="gmap"></div>
		<!--- //Google map -->
		
		<div class="wrap">
			<div class="row">
				
				<!--- Content -->
				<div class="full-width content textongrey">
					<h2>Send us a message</h2>
				</div>
				<!--- //Content -->
				
				<!-- Form -->
				<div class="three-fourth">
					<form method="post" action="contact_form_message.php" name="contactform" id="contactform">
						<div id="message"></div>
						<div class="f-row">
							<div class="one-half">
								<label for="name">Name and surname</label>
								<input type="text" id="name" />
							</div>
							<div class="one-half">
								<label for="email">Email address</label>
								<input type="email" id="email" />
							</div>
						</div>
						<div class="f-row">
							<div class="full-width">
								<label for="comments">Message</label>
								<textarea id="comments"></textarea>
							</div>
						</div>
						<div class="f-row">
							<input type="submit" value="Submit" id="submit" name="submit" class="btn color medium right" />
						</div>

					</form>
				</div>
				<!-- //Form -->
				
				<!--- Sidebar -->
				<aside class="one-fourth sidebar right">
					<!-- Widget -->
					<div class="widget">
						<h4>Need help booking?</h4>
						<div class="textwidget">
							<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your needs.</p>
							<p class="contact-data"><span class="ico phone black"></span> +212 611 200 616</p>
						</div>
					</div>
					<!-- //Widget -->
					
				</aside>
				<!--- //Sidebar -->
			</div>
		</div>
	</main>
	<!-- //Main -->
	
	<!-- Footer -->
	<footer class="footer black" role="contentinfo">
		<div class="wrap">
			<div class="row">
				<!-- Column -->
				<article class="one-half">
					<h6>About us</h6>
					<p>This is the most popular carpool offer, also known as a planned carpool or organized carpool. It responds as much to the needs of carpooling in business as the general public. This a personalized website we display carpools available on a territory and we facilitate the connection between passengers making the same trip daily or punctually.</p>
				</article>
				<!-- //Column -->
				
				<!-- Column -->
				<article class="one-fourth">
					<h6>Need help?</h6>
					<p>Contact us via phone or email:</p>
					<p class="contact-data"><span class="ico phone"></span> +212 611 200 616</p>
					<p class="contact-data"><span class="ico email"></span> <a href="mailto:mohamedboukili1998@gmail.com">help@Let'sGo.com</a></p>
				</article>
				<!-- //Column -->
				
				<!-- Column -->
				<article class="one-fourth">
					<h6>Follow us</h6>
					<ul class="social">
						<li class="facebook"><a href="https://www.facebook.com/momoboukili48" title="fb">facebook</a></li>
						<li class="twitter"><a href="https://twitter.com/MohaMmedBoukil2" title="tw">twitter</a></li>
						<li class="gplus"><a href="https://plus.google.com/u/0/105042514429475247651" title="gplus">google plus</a></li>
						<li class="linkedin"><a href="https://www.linkedin.com/in/mohammed-boukili-a17b22170/" title="link">linkedin</a></li>
						<li class="pinterest"><a href="https://www.pinterest.fr/mohamedboukili1998/" title="pinterest">pinterest</a></li>
					</ul>
				</article>
				<!-- //Column -->
			</div>
			
			<div class="copy">
				<p>Copyright 2019, Boukili Mohammed. All rights reserved. </p>
				
				<nav role="navigation" class="foot-nav">
					<ul>
						<li><a href="index.php" title="Home">Home</a></li>
						<li><a href="about.php" title="About us">About us</a></li>
						<li><a href="contact.php" title="Contact us">Contact us</a></li>
						</ul>
				</nav>
			</div>
		</div>
	</footer>
	<!-- //Footer -->
	
	<!-- Preloader -->
	<div class="preloader">
		<div id="followingBallsG">
			<div id="followingBallsG_1" class="followingBallsG"></div>
			<div id="followingBallsG_2" class="followingBallsG"></div>
			<div id="followingBallsG_3" class="followingBallsG"></div>
			<div id="followingBallsG_4" class="followingBallsG"></div>
		</div>
	</div>
	<!-- //Preloader -->
	
	
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBCQWDzYtLY_O_p92gGv4hIYuzTDigkog0&amp;sensor=false"></script>
	<script src="js/infobox.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
	
	<script type="text/javascript">
		function initialize() {
			var secheltLoc = new google.maps.LatLng(34.664621, -1.898649);

			var myMapOptions = {
				 zoom: 15
				,center: secheltLoc
				,mapTypeId: google.maps.MapTypeId.ROADMAP
				,scrollwheel: false
			};
			var theMap = new google.maps.Map(document.getElementById("map_canvas"), myMapOptions);

			var myIcon = new google.maps.MarkerImage('images/map-icon.png');
			
			var marker = new google.maps.Marker({
				map: theMap,
				draggable: true,
				position: new google.maps.LatLng(34.664621, -1.898649),
				visible: true,
				icon: myIcon
			});

			var myOptions = {
				 content: boxText
				,disableAutoPan: false
				,maxWidth: 0
				,pixelOffset: new google.maps.Size(-140, 0)
				,zIndex: null
				,closeBoxURL: ""
				,infoBoxClearance: new google.maps.Size(1, 1)
				,isHidden: false
				,enableEventPropagation: false
			};

			google.maps.event.addListener(marker, "click", function (e) {
				ib.open(theMap, this);
			});

			var ib = new InfoBox(myOptions);

			ib.open(theMap, marker);
		}
	</script>
	<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.avatar')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
  </body>
</html>