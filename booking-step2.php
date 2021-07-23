<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page

?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
		
	<title>Offer a ride | Step 1 | Let'sGo </title>
	
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
  <body >
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
						
					</div>
		</header>
	<!-- //Header -->
	
	<!-- Main -->
	<main class="main" role="main">
		<div class="wrap">
			<div class="row">
				<!--- Content -->
				<div class="full-width content">
					<br><h2><b>Offer a ride on your next long journey</b></h2>
				</div>
				<!--- //Content -->
			
				<div class="three-fourth">
					<form action="" method="POST">
						<?php

							if(isset($_POST['next'])){
							    session_start();
							    $_SESSION['origin-input']=$_POST['origin-input'];
							    $_SESSION['destination-input']=$_POST['destination-input'];
							    $_SESSION['dep-date']=$_POST['dep-date'];
							    $_SESSION['ret-date']=$_POST['ret-date'];
							    $_SESSION['seats']=$_POST['seats'];
							    $_SESSION['luggage']=$_POST['luggage'];
							    $_SESSION['cigarette']=$_POST['cigarette'];
							    $_SESSION['children']=$_POST['children'];
							    $_SESSION['music']=$_POST['music'];
							    header("location: booking-step3.php");}
							?>
					
						<header class="f-title color">1. Schedule</header>
						<div class="f-row">
							<div class="one-half">
								<br><p>Round trip
								<input type="checkbox" onchange="onCheckboxChanged(this.checked)" /></p>
							</div>
						</div>
						<div class="f-row">
							<div class="one-half">
								<label for="pickuploc">Pick up location</label>
								<input type="text" id="origin-input" name="origin-input"/>
							</div>
							<div class="one-half">
								<label for="dropoffloc">Drop off location</label>
								<input type="text" id="destination-input" name="destination-input"/>
							</div>
						</div>
						<div class="f-row">
							<div class="one-half">
								<label for="dep-date">Travel date :</label>
								<input type="text" id="dep-date" name="dep-date" />
							</div>
							<div class="one-half">
								<label for="ret-date" id="hiddenRow" style="display:none;">Return date :</label>
								<input type="text" id="ret-date" name="ret-date" style="display:none;"/>
								</div>
						</div>

						<header class="f-title color">2. Details</header>

						<div class="f-row">
							<div class="one-third">
								<label >Number of seats</label>
								<select name="seats">
									<option selected>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</div>
							<div class="one-third">
								<label >Luggage</label>
								<select  name="luggage">
									<option >Small - ex. : backpack</option>
									<option selected>Medium - ex. : weekend bag</option>
									<option>Large - ex. : travel bag</option>
								</select>
							</div>
							</div>
						<div class="f-row">
							<div class="one-half">
							<label >Preferences</label><br><br>
							<label >Cigarette
							  <input type="checkbox" name="cigarette" value="Cigarette"></label> &nbsp; &nbsp; &nbsp; &nbsp;
							
							<label >Children
							  <input type="checkbox" name="children" value="Children"></label> &nbsp; &nbsp; &nbsp; &nbsp;

							<label >Music
							  <input type="checkbox" name="music" value="Music"></label> &nbsp; &nbsp; &nbsp; &nbsp;
						</div></div>	
 						<div class="actions">
							<input type="submit" class="btn medium color right" name="next" value="Continue" />
						</div>
					</form>
				</div>
				
				<!--- Sidebar -->
				<aside class="one-fourth sidebar right">
					<!-- Widget -->
					<div class="widget">
								<div id="map" style="width: 342px; height: 385px; position: relative; overflow: hidden;"></div>
							</div>
					</div>
					<!-- //Widget -->
				</aside>
				<!--- //Sidebar -->
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
	<script src="js/jquery.datetimepicker.js"></script>
	<script src="js/search.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>

	 <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: 32.2580058, lng: -8.23146},
          zoom: 5
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'WALKING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});


        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace(); 
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
	  };
	  
	  
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM-N6lhTNS4DHTpQNxVl29TgTtxaTJ3qw&libraries=places&callback=initMap"async defer></script>

<script >
    function onCheckboxChanged(checked){
  if(checked){
    $("#hiddenRow").fadeIn();
	$("#ret-date").fadeIn();
    }
  else {
  	$("#hiddenRow").fadeOut();
  	$("#ret-date").fadeOut();
  }
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