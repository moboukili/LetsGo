<?php
// Initialize the session
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
        
    <title>Profil | Let'sGo </title>
    
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
                    <?php
                        if(isset($_POST['submit'])){
                            $sql = "UPDATE users SET drive = ? WHERE id = ?";      
                                    $stmt = mysqli_prepare($con, $sql);
                                    mysqli_stmt_bind_param($stmt, "si",$vehicle, $id);

                                    $vehicle = $_POST['vehicle'];
                                    $id= $_SESSION['id'];

                                    if(mysqli_stmt_execute($stmt)){ 
                                       $_SESSION['vehicle'] =  $vehicle;?>
                                 <div class="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                <img src="images/verified.png">&nbsp;&nbsp; Nous avons enregistré votre <?php echo htmlspecialchars($_SESSION["vehicle"]); ?>.
                                </div> 
                                   <?php } else{
                                                echo "Something went wrong. Please try again later.";
                                            }
                                        // Close statement
                                        mysqli_stmt_close($stmt);

                                // Close connection
                                    mysqli_close($con);
                        }
                                 
                        ?>
                    <br><h2>Votre voiture. </h2>  
                    <div class="box">
                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="f-row">
                                <div class="full-width">
                                    <center><h3><b>Vous avez un véhicule de quelle marque ?</b></h3></center>
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="full-width">
                                    <input type="text"id="myInput" name="vehicle" placeholder="Chercher"/>
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="full-width">
                                    <input type="submit" name="submit" value="Enregistrer" class="btn color medium" />
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
                            <li><a href="updatepass.php">Mot de passe</a></li>
                            <li class="active"><a href="vehicle.php">Véhicule</a></li>
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
    
       <!-- //Preloader -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/jquery.datetimepicker.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/vihecule.js"></script>
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