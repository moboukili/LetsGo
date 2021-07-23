<?php
// Initialize the session
require 'db.php';
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = '<span class="error_message">Veuillez entrer le nouveau mot de passe.</span>';     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = '<span class="error_message">Le mot de passe doit comporter au moins 6 caractères.</span>';
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = '<span class="error_message">S\'il vous plaît confirmer le mot de passe.</span>';
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = '<span class="error_message">Le mot de passe ne correspond pas.</span>';
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                $message = 'votre nouveau mot de passe est correct.';
                    echo "<SCRIPT type='text/javascript'> 
                        alert('$message');
                        window.location.replace(\"login.php\");
                        </SCRIPT>";
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
        
    <title>Mon mot de passe | Let'sGo </title>
    
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
   <main class="main" role="main">        
        <div class="wrap">
            <div class="row">
                <!--- Content -->
                <div class="content one-half modal">
                    <br><h2>Changer le mot de passe. </h2>  
                    <div class="box">
                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="f-row">
                                <div class="full-width <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                                    <input type="password" placeholder="nouveau mot de passe " name="new_password" value="<?php echo $new_password; ?>"/><br>
                                    <?php echo $new_password_err; ?>
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="full-width <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                    <input type="password" placeholder="Confirmer le nouveau " name="confirm_password" /><br>
                                    <?php echo $confirm_password_err; ?>
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="full-width">
                                    <input type="submit" name="submit" value="Enregistrer" class="btn color medium " />
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--//Login-->
                </div>
                <!--- //Content -->
                    <!--- Sidebar -->
                <aside class="one-fourth sidebar right">
                    <!-- Widget -->
                    <div class="widget">
                       <ul class="categories">
                            <li><a href="profil.php">Informations personnelles</a></li>
                            <li class="active"><a href="updatepass.php">Mot de passe</a></li>
                            <li><a href="vehicle.php">Véhicule</a></li>
                        </ul>
                    </div>
                    <!-- //Widget -->
                    
                </aside>
                <!--- //Sidebar -->
            </div>
        </div>
    </main>
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