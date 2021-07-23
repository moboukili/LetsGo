<?php 
require 'db.php';

if(isset($_POST['submit'])){
			if(!empty($_SESSION['cigarette']) && !empty($_SESSION['children']) && !empty($_SESSION['music']) && !empty($_SESSION['ret-date'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, returnDate, seats, luggage, cigarette, children, music, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssssss",$pickup, $dropoff, $travelDate, $returnDate, $seats, $luggage, $cigarette, $children, $music, $id);
     
			$pickup = $_SESSION['origin-input'];
			$dropoff = $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$returnDate= date('Y-m-d H:i:s', strtotime($_SESSION['ret-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$cigarette= $_SESSION['cigarette'];
			$children= $_SESSION['children'];
			$music= $_SESSION['music'];	
			$id= $_SESSION['id'];

			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if(empty($_SESSION['cigarette']) && empty($_SESSION['children']) && empty($_SESSION['ret-date']) && empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, seats, luggage, id) VALUES (?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssss",$pickup, $dropoff, $travelDate, $seats, $luggage, $id);

			$pickup = $_SESSION['origin-input'];
			$dropoff = $_SESSION['destination-input'];
			$travelDate = date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$seats = $_SESSION['seats'];
			$luggage = $_SESSION['luggage'];
			$id = $_SESSION['id'];

			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}

		///////////////////////////////////////////////////////////////////////////////////////////////////////

		if(!empty($_SESSION['cigarette']) && empty($_SESSION['ret-date']) && empty($_SESSION['children']) && empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, seats, luggage, cigarette, id) VALUES (?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss",$pickup, $dropoff, $travelDate, $seats, $luggage, $cigarette, $id);

			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$cigarette= $_SESSION['cigarette'];
			$id= $_SESSION['id'];

			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////////

		if(empty($_SESSION['cigarette']) && !empty($_SESSION['ret-date']) && empty($_SESSION['children']) && empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, returnDate, seats, luggage, id) VALUES (?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss",$pickup, $dropoff, $travelDate, $returnDate, $seats, $luggage, $id);

			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$returnDate= date('Y-m-d H:i:s', strtotime($_SESSION['ret-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$id= $_SESSION['id'];
			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		///////////////////////////////////////////////////////////////////////////////////

		if(empty($_SESSION['cigarette']) && empty($_SESSION['ret-date']) && !empty($_SESSION['children']) && empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, seats, luggage, children, id) VALUES (?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss",$pickup, $dropoff, $travelDate, $seats, $luggage, $children, $id);
			
			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$children= $_SESSION['children'];
			$id= $_SESSION['id'];
			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		/////////////////////////////////////////////////////////////////////////////////:::

		if(empty($_SESSION['cigarette']) && empty($_SESSION['ret-date']) && empty($_SESSION['children']) && !empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, seats, luggage, music, id) VALUES (?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss",$pickup, $dropoff, $travelDate, $seats, $luggage, $music, $id);
			
			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate = date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$music= $_SESSION['music'];
			$id= $_SESSION['id'];
			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		///////////////////////////////////////////////////////////////////

		if(!empty($_SESSION['cigarette']) && !empty($_SESSION['ret-date']) && empty($_SESSION['children']) && empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, returnDate, seats, luggage, cigarette, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss",$pickup, $dropoff, $travelDate, $returnDate, $seats, $luggage, $cigarette, $id);

			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$returnDate= date('Y-m-d H:i:s', strtotime($_SESSION['ret-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$cigarette= $_SESSION['cigarette'];
			$id= $_SESSION['id'];

			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		//////////////////////////////////////////////////////////////////////////////////

		if(!empty($_SESSION['cigarette']) && empty($_SESSION['ret-date']) && !empty($_SESSION['children']) && empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, seats, luggage, cigarette, children, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss",$pickup, $dropoff, $travelDate, $seats, $luggage, $cigarette, $children, $id);
			
			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$cigarette= $_SESSION['cigarette'];
			$children= $_SESSION['children'];
			$id= $_SESSION['id'];
			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		/////////////////////////////////////////////////////////////////////////////////////////

		if(!empty($_SESSION['cigarette']) && empty($_SESSION['ret-date']) && empty($_SESSION['children']) && !empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, seats, luggage, cigarette, music, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss",$pickup, $dropoff, $travelDate, $seats, $luggage, $cigarette, $music, $id);
			
			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$cigarette= $_SESSION['cigarette'];
			$music= $_SESSION['music'];
			$id= $_SESSION['id'];
			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		/////////////////////////////////////////////////////////////////////////////////////////

		if(empty($_SESSION['cigarette']) && !empty($_SESSION['ret-date']) && !empty($_SESSION['children'])  && empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, returnDate, seats, luggage, children, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss",$pickup, $dropoff, $travelDate, $returnDate, $seats, $luggage, $children, $id);

			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$returnDate= date('Y-m-d H:i:s', strtotime($_SESSION['ret-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$children= $_SESSION['children'];
			$id= $_SESSION['id'];
			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		///////////////////////////////////////////////////////////////////////////////////::

		if(empty($_SESSION['cigarette']) && !empty($_SESSION['ret-date']) && empty($_SESSION['children'])  && !empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, returnDate, seats, luggage, music, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss",$pickup, $dropoff, $travelDate, $returnDate, $seats, $luggage, $music, $id);

			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$returnDate= date('Y-m-d H:i:s', strtotime($_SESSION['ret-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$music= $_SESSION['music'];
			$id= $_SESSION['id'];
			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		////////////////////////////////////////////////::

		if(empty($_SESSION['cigarette']) && empty($_SESSION['ret-date']) && !empty($_SESSION['children'])  && !empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, seats, luggage, children, music, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss",$pickup, $dropoff, $travelDate, $seats, $luggage, $children, $music, $id);
			
			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$children= $_SESSION['children'];
			$music= $_SESSION['music'];
			$id= $_SESSION['id'];
			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}				            	
		if(!empty($_SESSION['cigarette']) && !empty($_SESSION['children']) && !empty($_SESSION['ret-date']) && empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, returnDate, seats, luggage, cigarette, children, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sssssssss",$pickup, $dropoff, $travelDate, $returnDate, $seats, $luggage, $cigarette, $children, $id);

			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$returnDate= date('Y-m-d H:i:s', strtotime($_SESSION['ret-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$cigarette= $_SESSION['cigarette'];
			$children= $_SESSION['children'];
			$id= $_SESSION['id'];
		if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		//////////////////////////////////////:

		if(!empty($_SESSION['cigarette']) && empty($_SESSION['children']) && !empty($_SESSION['ret-date']) && !empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, returnDate, seats, luggage, cigarette, music, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sssssssss",$pickup, $dropoff, $travelDate, $returnDate, $seats, $luggage, $cigarette, $music, $id);

			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$returnDate= date('Y-m-d H:i:s', strtotime($_SESSION['ret-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$cigarette= $_SESSION['cigarette'];
			$music= $_SESSION['music'];
			$id= $_SESSION['id'];
		if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		///////////////////////////////////////:

		if(!empty($_SESSION['cigarette']) && !empty($_SESSION['children']) && empty($_SESSION['ret-date']) && !empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, seats, luggage, cigarette, children, music, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sssssssss",$pickup, $dropoff, $travelDate, $seats, $luggage, $cigarette, $children, $music, $id);
			
			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$cigarette= $_SESSION['cigarette'];
			$children= $_SESSION['children'];
			$music= $_SESSION['music'];	
			$id= $_SESSION['id'];

			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}
		//////////////////////////////////////:

		if(empty($_SESSION['cigarette']) && !empty($_SESSION['children']) && !empty($_SESSION['ret-date']) && !empty($_SESSION['music'])){
			
			// Enter the new user in the database
			$sql = "INSERT INTO ride (pickup, dropoff, travelDate, returnDate, seats, luggage, children, music, id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sssssssss",$pickup, $dropoff, $travelDate, $returnDate, $seats, $luggage, $children, $music, $id);

			$pickup= $_SESSION['origin-input'];
			$dropoff= $_SESSION['destination-input'];
			$travelDate= date('Y-m-d H:i:s', strtotime($_SESSION['dep-date']));
			$returnDate= date('Y-m-d H:i:s', strtotime($_SESSION['ret-date']));
			$seats= $_SESSION['seats'];
			$luggage= $_SESSION['luggage'];
			$children= $_SESSION['children'];
			$music= $_SESSION['music'];	
			$id= $_SESSION['id'];

			if(mysqli_stmt_execute($stmt)){
		    	header("location: anonce.php"); 
			} else{
		                echo "Something went wrong. Please try again later.";
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}

		// Close connection
		    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
		
	<title>Proposer un trajet | Étape 2 | Let'sGo </title>
	
	<link rel="stylesheet" href="css/theme-lblue.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/css.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700">
	<link rel="shortcut icon" href="images/car.ico">

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
					<h1>Votre réservation n'a pas encore confirmée. </h1>
				</div>
			</div>
		</header>
		<!-- //Page info -->
		<div class="wrap">
			<div class="row">
				<div class="three-fourth">
					<form class="box readonly" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
						
						<h3><b>Information passager</b></h3>

						<div class="f-row">
							<div class="one-fourth">Nom d'utilisateur</div>
							<div class="three-fourth" ><?php echo htmlspecialchars($_SESSION["username"]);?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">Numéro </div>
							<div class="three-fourth"><?php echo htmlspecialchars($_SESSION["phone"]); ?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">Email</div>
							<div class="three-fourth"><?php echo htmlspecialchars($_SESSION["email"]); ?></div>
						</div>
						<h3><b>Itinéraire</b></h3>
						<div class="f-row">
							<div class="one-fourth">Date de voyage</div>
							<div class="three-fourth"><?php echo htmlspecialchars($_SESSION["dep-date"]);?></div>
						</div>
						
							<?php if(!empty($_SESSION['ret-date']))
							{ ?><div class="f-row">
							<div class="one-fourth">Date du retour</div>
							<div class="three-fourth"><?php echo htmlspecialchars($_SESSION['ret-date']);?></div>
						</div>	
						<?php
                        }
                        ?>
						<div class="f-row">
							<div class="one-fourth">De</div>
							<div class="three-fourth"><?php echo htmlspecialchars($_SESSION["origin-input"]);?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">À</div>
							<div class="three-fourth"><?php echo htmlspecialchars($_SESSION["destination-input"]);?></div>
						</div>
						<h3><b>Détails du voyage</b></h3>
						<div class="f-row">
							<div class="one-fourth">Nombre de places</div>
							<div class="three-fourth"><?php echo htmlspecialchars($_SESSION["seats"]);?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">Bagages</div>
							<div class="three-fourth"><?php echo htmlspecialchars($_SESSION["luggage"]);?></div>
						</div>
						<div class="f-row">
							<div class="one-fourth">Préférences</div>
							<div class="three-fourth"><?php 
							if(!empty($_SESSION["cigarette"]))
							{ echo htmlspecialchars($_SESSION["cigarette"]);
								echo "&nbsp; &nbsp;";}
						
							if(!empty($_SESSION["children"]))
							{ echo htmlspecialchars($_SESSION["children"]);
								echo "&nbsp; &nbsp;";}

							if(!empty($_SESSION["music"]))
							{ echo htmlspecialchars($_SESSION["music"]);}?></div>
						</div>
						<div class="actions">
							<input action="action" class="btn medium color back " onclick="window.history.go(-1); return false;" type="button" value="Retour" />
							<input type="submit" class="btn medium color right" name="submit" value="Confirme"></input>

						</div>
					</form>
				</div>
		
				
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