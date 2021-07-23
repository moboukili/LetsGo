<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
	<meta charset="utf-8">
		
	<title>The daily carpooling site | Let'sGo </title>
	
	<link rel="stylesheet" href="css/theme-lblue.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/css.css" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="images/car.ico" />
	 <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
	 <style>

</style>
  </head>
  
  <body class="home">
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
		<!-- Intro -->
		<div class="intro">
			<div class="wrap">
				<div class="textwidget">
					<?php
						if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
						?>
						<h1 class="wow fadeInDown">Need a ride?</h1>
						<?php
                        } else {
                        	?>
                        	<h1 class="wow fadeInDown">Welcome &nbsp;<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
                        	</h1>
                        	<?php
                        }
                        ?>
					<h2 class="wow fadeInUp">You've come to the right place.</h2>
					<div class="actions">
						<a href="search-results.php" title="Find a ride" class="btn large white wow fadeInLeft anchor">Find a ride</a>
						<a href="booking-step2.php" title="Offer a ride" class="btn large color wow fadeInRight anchor">Offer a ride</a>
					</div>
				</div>
			</div>
		</div>
		<!-- //Intro -->
		
		<!-- Search -->
		<div class="advanced-search color" id="booking">
			<div class="wrap">
				<form role="form" action="search-results.php" method="post">
					<!-- Row -->
					<div class="f-row">
						<div class="form-group datepicker one-third">
							<input type="text" id="dep-date" placeholder="Date" name="dep-date" />
						</div>
						<div class="form-group select one-third">
							<input type="text" id="origin-input" placeholder="Leaving from.." name="origin-input">
						</div>
						<div class="form-group select one-third">
							<input type="text" id="destination-input" placeholder="Going to.." name="destination-input"/>
						</div>
					</div>
					<!-- //Row -->
					
					<!-- Row -->
					<div class="f-row">
						<div class="form-group datepicker one-third">
							<input type="text" id="ret-date" placeholder="Return date" name="ret-date" />
						</div>
						<div class="form-group select one-third">
							<div id="map" ></div>
						</div>
					</div>
					<!-- //Row -->
					
					<!-- Row -->
					<div class="f-row">
						<div class="form-group right">
							<button type="submit" class="btn large black" name="search">Find a transfer</button>
						</div>
						<div class="form-group radios">
							<div>
								<input type="radio" name="radio" id="return" value="return" />
								<label for="return">Return</label>
							</div>
							<div>
								<input type="radio" name="radio" id="oneway" value="oneway" checked />
								<label for="oneway">One way</label>
							</div>
						</div>
					</div>
					<!--// Row -->
				</form>
			</div>
		</div>
		<!-- //Search -->
		
		<!-- Services iconic -->
		<div class="services iconic white">
			<div class="wrap">
				<div class="row">
					<!-- Item -->
					<div class="one-third wow fadeIn">
						<span class="circle"><span class="ico pig"></span></span>
						<h3>Let'sGo Points</h3>
						<p>Earn points whenever you book a ride  and use them to get discounts on reduces transportation.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".2s">
						<span class="circle"><span class="ico lock"></span></span>
						<h3>Reliable transfers</h3>
						<p> All profiles and ratings are checked. IDs are properly verified. So you know who you’re travelling with.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn">
						<span class="circle"><span class="ico heart"></span></span>
						<h3>simple Carpooling</h3>
						<p>Get to your exact destination, without the hassle. Carpooling cuts out transfers, queues and the waiting around the station time.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".2s">
						<span class="circle"><span class="ico wand"></span></span>
						<h3>Booking flexibility</h3>
						<p>Enter your exact address to find the perfect ride. Choose who you’d like to travel with. And book!</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".4s">
						<span class="circle"><span class="ico telephone"></span></span>
						<h3>Clever CUSTOMER SERVICE</h3>
						<p>With access to millions of journeys, you can quickly find people nearby travelling your way.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".4s">
						<span class="circle"><span class="ico shuttle"></span></span>
						<h3>Ridesharing</h3>
						<p>Getting a ride is the cheap and social way to travel. Offer a ride if you have empty seats and share the costs.</p>
					</div>
					<!-- //Item -->
				</div>
			</div>
		</div>
		<!-- //Services iconic -->
		<div class="services boxed white" id="services">
		<!-- Services -->

			<!-- Item -->
			<div class="home-block">
		  	<div class="home-block-img">
				<img src="images/vtc.jpg">
		  	</div>
		 	<div class="home-block-text">
				<h2>Where do you want to drive to?</h2><br>
				<p>Let's make this your least expensive journey ever.</p>
			<div class="f-row">
			 <br><a href="booking-step2.php" title="Booking step "><input type="submit" value="Offer a ride" id="submit" name="submit" class="btn color medium right" /></a>
			</div></div></div></div>
			
		
			<!-- //Item -->			
		
		<!-- //Services -->
		
		<!-- Testimonials -->
		<div class="testimonials center black">
			<div class="wrap">
				<h6 class="wow fadeInDown">Wow, this theme is outstanding!</h6>
				<p class="wow fadeInUp">Let'sGo a free carpool site. We organize planned carpooling and dynamic carpooling.<br>
				Let'sGo provides you with a real-time carpool system that lets you find a driver or passenger who will contribute to your transportation costs, immediately when you are leaving or when you are already on the road.</p>
				<p class="meta wow fadeInUp">-Mohammed Boukili, Let'sGo</p>
			</div>
		</div>
		
		<!-- Call to action -->
		    <?php
					if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
					?> 
					<div class="color cta">
						<div class="wrap">
				
					<p class="wow fadeInLeft">Ready to join Let'sGo?.Sign up today — it's 100% free.</p>
				      <a href="register.php" class="btn huge black right wow fadeInRight">Sign up with email</a>
					</div></div>
					<?php
                        } else {
                        	?>
						<?php
                        }
                        ?>
			
		
		<!-- //Call to action -->
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

					<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                
				<ul class="navbar-nav mr-auto">
            
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> English</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                                <a class="dropdown-item" href="\Transfers\LET'SGO\francais\index.php"><span class="flag-icon flag-icon-fr"> </span>  French</a>
                            </div>
                        </li>
                    </ul>
                </nav>
				</article></div>
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
	
	 <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/search.js"></script>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQYxRwlgxJBgbgppIJoU4b4OPMjPmyE14&libraries=places&callback=initMap"async defer></script>
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