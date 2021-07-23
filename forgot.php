<?php
require_once 'db.php';

//check submit
if  (isset($_POST['submit'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$db = user($username);
$result = mysqli_num_rows($db);

//check is there username in database
if ($result !=0) {
  while ($row=mysqli_fetch_assoc($db)){
    $db_email = $row['email'];
  }

//check input email similiar with email in database
if ($email==$db_email){
// for send token
  $alamat = "http://localhost/Transfers/LET'SGO/update.php?username=$username";
  $to = $db_email;
  $judul = "passwrod reset";
  $isi = "this is automatic email, dont repply. For reset your password please click this link ".$alamat;
  $headers = "From: mohamedboukili1998@gmail.com" . "\r\n";
  mail($to,$judul,$isi,$headers);

//echo $alamat;
if (mail($to,$judul,$isi,$headers)){
  echo "<script>alert('Go check your email');</script>";
}else {
  echo "please try again";
}

}else {echo"your email didn't register";}

}else {echo"your username didn't register";}
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <title>Change password | Let'sGo</title>
    
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
                                <div class="full-width">
                                    <input type="text" placeholder="Username" name="username" />
                               </div>
                            </div>
                            <div class="f-row">
                                <div class="full-width">
                                    <input type="text" placeholder="Email" name="email" />
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="full-width">
                                    <input type="submit" name="submit" value="Submit" class="btn color medium full" />
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