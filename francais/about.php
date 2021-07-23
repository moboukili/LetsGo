<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
		
	<title>A propos de nous | Let'sGo</title>
	
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
					<a href="index.php" title="Let'sGo"><img src="images/cc.jpeg" alt="Let'sGo" /></a>
				</div>
				<!-- //Logo -->
				
				<!-- Main Nav -->
				<nav role="navigation" class="main-nav">
					<ul>
						<li class="active"><a href="search-results.php" title="Trouver un trajet"><b>Rechercher</b></a></li>
						<li><a href="booking-step2.php" title="Étape de réservation "><b>Proposer un trajet</b></a></li>
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
		<!-- Page info -->
		<header class="site-title color">
			<div class="wrap">
				<div class="container">
					<h1>A propos de nous</h1>
					<nav role="navigation" class="breadcrumbs">
						<ul>
							<li><a href="index.php" title="Accueil">Accueil</a></li>
							<li>A propos de nous</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<!-- //Page info -->
		
		<div class="wrap">
			<div class="row">
				<!--- Content -->
				<div class="content three-fourth textongrey">
					<h2><center><b>Nous imaginons un monde du voyage plus équitable et plus ouvert.
								Où les gens sont mieux connectés et indépendants.</b></center></h2>
					<p class="lead">Let'sGo est la solution de covoiturage quotidienne, en particulier pour les trajets domicile-lieu de domicile, université et domicile. Le covoiturage quotidien est une pratique transgénérationnelle et présente également l'avantage de s'adapter aux capacités financières de tous les publics.</p> 

					<p>Let'sGo est la première plate-forme de covoiturage longue distance au monde. C’est un marché communautaire de confiance qui relie les automobilistes avec des sièges vides aux passagers à la recherche d’un trajet, sur des distances moyennes de 300 km. Let'sGo crée un réseau de voyage entièrement nouveau, alimenté par les personnes. Avec un service dédié aux relations avec les membres, une plateforme Web et mobile à la fine pointe de la technologie et une communauté de confiance en plein essor, Let'sGo rend les voyages plus sociaux, plus économiques et plus efficaces pour des millions de membres.</p>
					<h3>CURIEUX SUR NOS IMPACTS SOCIAUX?</h3>
					<p>Le covoiturage crée un espace unique, permettant des échanges entre des personnes qui n'auraient peut-être jamais rencontré autrement mais qui se réunissent pour partager un trajet.<br>
					- Bringing People Closer est la plus grande étude menée sur les impacts sociaux du covoiturage et révèle les liens sociaux créés par le covoiturage.<br>
					- Dans l'étude Entering the Trust Age, menée conjointement avec NYU Stern, vous pouvez également vous familiariser avec les outils de confiance numériques qui ont permis à Let'sGo de créer une relation de confiance à grande échelle et de permettre à des millions de personnes de partager des voyages à longue distance.</p>
					<h3>Let'sGo est basé sur 3 pilules de découverte :</h3>
					<p>Faciliter l'utilisation du covoiturage quotidiennement.<br>
						Se rapprocher des pratiques quotidiennes de mobilité des conducteurs.<br>
						Développer des synergies avec différents acteurs de la mobilité.<br>
						Nous proposons à nos membres des services innovants et adaptés aux besoins de la vie quotidienne. </p>
						<h3><b>Notre objectif ? Vous permettent de faire du covoiturage en paix.</b></h3>
				</div>
				<!--- //Content -->
			</div>
		</div>
	</main>
	<!-- //Main -->
	
	<!-- Services iconic -->
	
	<!-- //Call to action -->
	
	<!-- Footer -->
<footer class="footer black" role="contentinfo">
		<div class="wrap">
			<div class="row">
				<!-- Column -->
				<article class="one-half">
					<h6>A propos de nous</h6>
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
					<h6>Suivez nous</h6>
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
						<li><a href="about.php" title="A propos de nous">A propos de nous</a></li>
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
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
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