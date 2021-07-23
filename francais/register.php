<?php

$con = mysqli_connect("localhost","root","", "cov_db") or die(mysql_error());
 
// Define variables and initialize with empty values
$email = $phone = $username = $password = $confirm_password = "";
$email_err = $phone_err = $username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    //validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "<span class='error_message'>S'il vous plaît entrer un email.</span>";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "<span class='error_message'>Cet e-mail est déjà pris.</span>";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Quelque chose c'est mal passé. Merci d'essayer plus tard.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate phone
    if(empty(trim($_POST["phone"]))){
        $phone_err = "<span class='error_message'>veuillez entrer un téléphone.</span>";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE phone = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_phone);
            
            // Set parameters
            $param_phone = trim($_POST["phone"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $phone_err = "<span class='error_message'>Ce téléphone est déjà pris.</span>";
                } else{
                    $phone = trim($_POST["phone"]);
                }
            } else{
                echo "Oops! Quelque chose c'est mal passé. Merci d'essayer plus tard.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "<span class='error_message'>Merci d'entrer un nom d'utilisateur.</span>";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "<span class='error_message'>Ce nom d'utilisateur est déjà pris.</span>";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Quelque chose c'est mal passé. Merci d'essayer plus tard.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "<span class='error_message'>Veuillez entrer un mot de passe.</span>";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "<span class='error_message'>Le mot de passe doit comporter au moins 6 caractères.</span>";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "<span class='error_message'>S'il vous plaît confirmer le mot de passe.</span>";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "<span class='error_message'>Le mot de passe ne correspond pas.</span>";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($fullName_err) && empty($email_err) && empty($phone_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
 
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, phone, username, password) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss",$param_email, $param_phone, $param_username, $param_password);
            
            // Set parameters
            $param_email = $email;
            $param_phone = $phone;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                // Store data in session variables
                header("location: login.php");
            } else{
                echo "Quelque chose c'est mal passé. Merci d'essayer plus tard.";
            }
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
		
	<title>S'inscrire sur Let'sGo | Let'sGo</title>
	
<link rel="stylesheet" href="css/theme-lblue.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/animate.css" />
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
			</div>
		</header>
	<!-- //Header -->
	
	<!-- Main -->
	<main class="main" role="main">
		<!-- Page info -->
		<header class="site-title color">
			<div class="wrap">
				<div class="container">
					<h1>Inscription</h1>
					<nav role="navigation" class="breadcrumbs">
						<ul>
							<li><a href="index.php" title="Home">Accueil</a></li>
							<li>Inscription</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<!-- //Page info -->
		
		<div class="wrap">
			<div class="row">
				<!--- Content -->
				<div class="content one-half modal">
					<!--Login-->
					<div class="box">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="f-row">
							<div class="full-width <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
								<input type="email" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>"/><br>
								<?php echo $email_err; ?>
							</div>
						</div>
						<div class="f-row">
							<div class="full-width <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
								<input type="phone" placeholder="Téléphone (06XXXXXXXX)" name="phone" id="phone" value="<?php echo $phone; ?>" /><br>
								<?php echo $phone_err; ?>
							</div>
						</div>
						<div class="f-row">
							<div class="full-width <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
								<input type="text" placeholder="Nom d'utilisateur" name="username" id="username" value="<?php echo $username; ?>"/><br>
								<?php echo $username_err; ?>
							</div>
							</div>
						<div class="f-row">
							<div class="full-width <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
								<input type="password" placeholder="Mot de passe" name="password" id="password" value="<?php echo $password; ?>"/><br>
								 <?php echo $password_err; ?>
							</div>
						</div>
						<div class="f-row">
							<div class="full-width <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
								<input type="password" placeholder="Confirmez le mot de passe" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password; ?>"/><br>
								<?php echo $confirm_password_err; ?>
							</div>
							</div>
						<div class="f-row">
							<div class="full-width">
								<input type="submit" name='submit' value="Créer un compte" class="btn color medium full" />
								</div>
							</div>
							
							<p>Vous avez déjà un compte? <a href="login.php">Connectez-vous maintenant</a>.</p>
						</form>
					</div>
					<!--//Login-->
				</div>
				<!--- //Content -->
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
	<script src="js/jquery.datetimepicker.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>
	
  </body>
</html>