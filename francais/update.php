<?php
require_once 'db.php';
$username = $_GET['username'];

//check link
 if (isset($username)){
 $db_user = user($username);
 $row = mysqli_fetch_assoc($db_user);
 $db_username = $row ['username'];

//check between usernames that are in links and databases
if ($db_username==$username){
  //check submit
  if  (isset($_POST['submit'])) {
  $password = $_POST['password'];
  $param_password = password_hash($password, PASSWORD_DEFAULT);
  $confirm_password = $_POST['confirm_password'];
  //check password
  if ($password==$confirm_password) {
  echo "<script>alert('Votre nouveau mot de passe est correct');</script>";
    update_pass($param_password, $username);
    header('location:login.php');
  }else {echo "Mot de passe est différent ";}
  }
}else{echo "Le nom d'utilisateur est différent";}
}else{echo "Le lien est incorrect";}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <title>Mettre à jour le mot de passe | Let'sGo</title>
    
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
    <header class="header" role="banner">
      <div class="wrap">
        <!-- Logo -->
        <div class="logo">
          <a href="index.php" title="Let'sGo"><img src="images/cc.jpeg" alt="Let'sGo" /></a>
        </div>
        <!-- //Logo -->
        
        <!-- Main Nav -->
        
      </div>
    </header>
   <main class="main" role="main">        
        <div class="wrap">
            <div class="row">
                <!--- Content -->
                <div class="content one-half modal">
                    <br> <br> <br> <br> 
                    <div class="box">
                      <form action="" method="post">
                            <div class="f-row">
                                <div class="full-width ">
                                    <input type="password" placeholder="nouveau mot de passe " name="password" />
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="full-width">
                                    <input type="password" placeholder="Confirmez le mot de passe" name="confirm_password" />
                                    
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="full-width">
                                    <input type="submit" name="submit" value="Soumettre" class="btn color medium full" />
                                </div>
                            </div>
                        </form>
          </div>
          <!--//Login-->
        </div>
        <!--- //Content -->
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