<?php 

require 'db.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	
	<title>Trouver un trajet | Let'sGo </title>
	
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
  
  <body>
    <!-- Header -->
<header class="header" role="banner">
			<div class="wrap">
				<!-- Logo -->
				<div class="logo">
					<a href="index.php" title="Transfers"><img src="images/cc.jpeg" alt="Transfers" /></a>
				</div>
				<!-- //Logo -->
				
				<!-- Main Nav -->
				<nav role="navigation" class="main-nav">
					<ul>
						<li class="active"><a href="search-results.php" title="Trouver un trajet"><b>Rechercher</b></a></li>
						<li><a href="booking-step2.php" title="Étape de réservation"><b>Proposer un trajet</b></a></li>
						<li><b>|</b></li>
							<?php
						if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
						?>
						<li><a href="register.php" title="Inscription"><b>Inscription </b></a></li>
						<li><a href="login.php" title="Connexion"><b>Connexion</b></a></li>
						<?php
                        } else {
                        	?>
                        	<div class="logo">
							   <div class="dropdown">
								  &nbsp;&nbsp;&nbsp;&nbsp;<img src="images/user5.png" onclick="myFunction()"alt="avatar" class="avatar">
								  <div id="myDropdown" class="dropdown-content">
								    <a href="anonce.php">Trajets publiés</a>
								    <a href="profil.php">profil</a>
								    <a href="logout.php">Déconnexion</a>
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
		<!-- Search -->
		<div class="advanced-search color">
			<div class="wrap">

				<form role="form" action="search-results.php" method="post">
					<!-- Row -->
					<div class="f-row">
						<div class="form-group datepicker one-third">
							<input type="text" id="dep-date" placeholder="Date d'aller" name="dep-date" />
						</div>
						<div class="form-group select one-third">
							<input type="text" id="origin-input" placeholder="Départ" name="origin-input">
						</div>
						<div class="form-group select one-third">
							<input type="text" id="destination-input" placeholder="Destination" name="destination-input"/>
						</div>
					</div>
					<!-- //Row -->
					
					<!-- Row -->
					<div class="f-row">
						<div class="form-group datepicker one-third">
							<input type="text" id="ret-date" placeholder="Date de retour" name="ret-date" />
						</div>
						<div class="form-group select one-third">
							<div id="map" ></div>
						</div>
					</div>
					<!-- //Row -->
					
					<!-- Row -->
					<div class="f-row">
						<div class="form-group right">
							<button type="submit" class="btn large black" name="search">Chercher un trajet</button>
						</div>
						<div class="form-group radios">
							<div>
								<input type="radio" name="radio" id="return" value="return" />
								<label for="return">Revenir</label>
							</div>
							<div>
								<input type="radio" name="radio" id="oneway" value="oneway" checked />
								<label for="oneway">Aller</label>
							</div>
						</div>
					</div>
					<!--// Row -->
				</form>
			</div>
		</div>
		<!-- //Search -->
	</main>

	<?php if(isset($_POST['origin-input'])) { ?>
	<!-- //Main -->
	<main class="main" role="main">
		<div class="wrap">
			<div class="row">
				<!--- Content -->
				<div class="full-width content">
					
					
					<?php

								$pickup = $_POST['origin-input'];
								$dropoff = $_POST['destination-input'];
								$travelDate = date('Y-m-d H:i:s', strtotime($_POST['dep-date']));
								$returnDate = date('Y-m-d H:i:s', strtotime($_POST['ret-date']));
								// Enter the new user in the database
								if($_POST['radio'] == 'return') { 
									$sql = "SELECT * FROM  ride r, users u 
											WHERE r.pickup LIKE '%$pickup%' 
											AND r.dropoff LIKE '%$dropoff%' 
											AND ( r.travelDate BETWEEN  DATE_ADD('$travelDate', INTERVAL -10 DAY) AND
											DATE_ADD('$travelDate', INTERVAL 10 DAY) )
											AND ( r.returnDate BETWEEN  DATE_ADD('$returnDate', INTERVAL -10 DAY) AND
											DATE_ADD('$returnDate', INTERVAL 10 DAY) )
											AND r.id = u.id";}
											else { 
											$sql = "SELECT * FROM  ride r, users u 
											WHERE r.pickup LIKE '%$pickup%' 
											AND r.dropoff LIKE '%$dropoff%' 
											AND ( r.travelDate BETWEEN  DATE_ADD('$travelDate', INTERVAL -10 DAY) AND
											DATE_ADD('$travelDate', INTERVAL 10 DAY) )
											AND r.id = u.id";}

								
								
								$result = mysqli_query($con, $sql);
						 ?>


					<div class="results">
						<!-- Item -->
					
							
					<?php 
					          // output data of each row
					          while ($row = mysqli_fetch_array($result)) {

			                          ?>
							 
								<article class="result">
							<div class="one-fourth heightfix">
									<br>
										<p>&nbsp;&nbsp;Email : <strong> <?php echo htmlspecialchars($row["email"]); ?></strong></p> <br />
										<p>&nbsp;&nbsp;telephone : <strong> <?php echo htmlspecialchars($row["phone"]); ?></strong></p> <br /><?php if($row["drive"]==0)  {
	                                   }else{ ?>
										<p>&nbsp;&nbsp;voiture marque : <strong> <?php echo htmlspecialchars($row["drive"]); }?></strong></p> <br />
										<p>&nbsp;&nbsp;Preferences :<strong> <?php echo htmlspecialchars($row["cigarette"]);?>&nbsp;
										<?php echo htmlspecialchars($row["children"]); ?>&nbsp;
										<?php echo htmlspecialchars($row["music"]);?> </strong></p> <br />
									</div>
							<div class="one-half heightfix">
								<h3><?php echo htmlspecialchars($row["username"]); ?></h3>
								<ul>
									<li>
										<span class="ico people"></span>
										<p>Max <strong><?php echo htmlspecialchars($row["seats"]);?></strong> <br />par véhicule</p>
									</li>
									<li>
										<span class="ico luggage"></span>
										<p>Max <strong><?php echo htmlspecialchars($row["luggage"]);?></strong> <br />par véhicule</p>
									</li>
									<li>
										<span class="ico time"></span>
										<p><?php echo htmlspecialchars($row["travelDate"]);?><br /><?php if($row["returnDate"]==0) {
	                                   	echo "";
	                                   }else{ ?>
										/<br /><?php echo htmlspecialchars($row["returnDate"]); } ?></p>
									</li>
								</ul>
							</div>
							<div class="one-fourth heightfix">
								<div>
									<h3><?php echo htmlspecialchars($row["pickup"]);?><br /><small>à</small><br />
									<?php echo htmlspecialchars($row["dropoff"]);?></h3>
								</div>
							</div>
						</article>
						<?php  } 
                                mysqli_close($con); 
                             ?> 
						<!-- //Item -->
					</div>
				</div>
				<!--- //Content -->
			</div>
		</div>
	</main>
	<?php  } ?>

	<!-- Footer -->
	<footer class="footer black" role="contentinfo">
		<div class="wrap">
			<div class="row">
				<!-- Column -->
				<article class="one-half">
					<h6>À propos de nous</h6>
					<p>Il s'agit de l'offre de covoiturage la plus populaire, également connue sous le nom de covoiturage planifié ou organisé. Il répond autant aux besoins du covoiturage en entreprise que du grand public. Sur ce site personnalisé, nous montrons les covoiturages disponibles sur un territoire et nous facilitons la liaison entre les passagers effectuant le même voyage quotidiennement ou occasionnellement.</p>
				</article>
				<!-- //Column -->
				
				<!-- Column -->
				<article class="one-fourth">
					<h6>Besoin d'aide pour?</h6>
					<p>Contactez-nous par téléphone ou par email:</p>
					<p class="contact-data"><span class="ico phone"></span> +212 611 200 616</p>
					<p class="contact-data"><span class="ico email"></span> <a href="mailto:mohamedboukili1998@gmail.com">help@Let'sGo.com</a></p>
				</article>
				<!-- //Column -->
				
				<!-- Column -->
				<article class="one-fourth">
					<h6>Follow us</h6>
					<ul class="social">
						<li class="facebook"><a href="https://www.facebook.com/momoboukili48" title="fab">facebook</a></li>
						<li class="twitter"><a href="https://twitter.com/MohaMmedBoukil2" title="tw">twitter</a></li>
						<li class="gplus"><a href="https://plus.google.com/u/0/105042514429475247651" title="gplus">google plus</a></li>
						<li class="linkedin"><a href="https://www.linkedin.com/in/mohammed-boukili-a17b22170/" title="link">linkedin</a></li>
						<li class="pinterest"><a href="https://www.pinterest.fr/mohamedboukili1998/" title="pinterest">pinterest</a></li>
					</ul>
				</article>
				<!-- //Column -->
			</div>
			
			<div class="copy">
				<p>Copyright 2019, Mohammed Boukili. Tous les droits sont réservés. </p>
				
				<nav role="navigation" class="foot-nav">
					<ul>
						<li><a href="index.php" title="Accueil">Accueil</a></li>
						<li><a href="about.php" title="À propos de nous">À propos de nous</a></li>
						<li><a href="contact.php" title="Contactez nous">Contactez nous</a></li>
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