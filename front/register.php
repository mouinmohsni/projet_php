<?php
// Assure-toi que la session est démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../classes/User.php";

$allpays = ["Afghanistan", "Afrique du Sud", "Albanie", "Algérie", "Allemagne", "Andorre", "Angola", "Arabie Saoudite", "Argentine", "Arménie", "Australie", "Autriche",  "Azerbaïdjan", "Belgique", "Bénin", "Biélorussie", "Bolivie", "Bosnie-Herzégovine", "Botswana", "Brésil", "Bulgarie", "Burkina Faso", "Cameroun", "Canada", "Chili", "Chine", "Chypre", "Colombie", "Comores", "Congo", "Corée du Nord", "Corée du Sud", "Costa Rica", "Croatie", "Cuba", "Danemark", "Djibouti", "Égypte",
        "Émirats arabes unis", "Équateur", "Espagne", "Estonie", "États-Unis", "Éthiopie", "Finlande", "France", "Gabon", "Gambie", "Géorgie", "Ghana", "Grèce", "Guinée", "Haïti", "Hongrie", "Inde", "Indonésie", "Irak", "Iran", "Irlande", "Islande", "Israël", "Italie", "Japon", "Jordanie", "Kazakhstan", "Kenya", "Koweït", "Lettonie", "Liban", "Libye", "Lituanie", "Luxembourg", "Madagascar", "Malaisie", "Mali", "Malte", "Maroc", "Mauritanie", "Mexique", "Monaco", "Mongolie", "Mozambique", "Namibie", "Népal", "Niger",
        "Nigéria", "Norvège", "Nouvelle-Zélande", "Oman", "Ouzbékistan", "Pakistan", "Palestine", "Panama", "Paraguay", "Pays-Bas", "Pérou", "Philippines", "Pologne", "Portugal", "Qatar", "République Centrafricaine", "République Tchèque", "Roumanie", "Royaume-Uni", "Russie", "Rwanda", "Sénégal", "Serbie", "Singapour", "Slovaquie", "Slovénie", "Somalie", "Soudan", "Sri Lanka", "Suède", "Suisse", "Syrie", "Tanzanie", "Tchad", "Thaïlande", "Tunisie", "Turquie", "Ukraine", "Uruguay", "Venezuela", "Viêt Nam", "Yémen", "Zambie", "Zimbabwe"
];

$Users = new User();

$msg_password="";
$msg_mail="";
if (isset($_POST["ajouter"])){
    if (($_POST["password"] != $_POST["confirm_password"]) or ($_POST["password"]=="")){
        $msg_password ="mot de passe incorrect";

    }else{
        $user = $Users ->getUserWithMail($_POST);
        if ($user){
            $msg_mail="adresse mail deja existante";
        }else{
            $userId = $Users ->addUser($_POST);
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_name'] = $_POST["nom"];
            $_SESSION["role"] = "user";

            header('Location: login.php');

        }

    }


}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="./assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="./assets/css/style-register.css">

		 <!--font-family-->
		 <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
		 <!-- title of site -->
		 <title>Directory Landing Page</title>
 
		 <!-- For favicon png -->
		 <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
		
		 <!--font-awesome.min.css-->
		 <link rel="stylesheet" href="assets/css/font-awesome.min.css">
 
		 <!--linear icon css-->
		 <link rel="stylesheet" href="assets/css/linearicons.css">
 
		 <!--animate.css-->
		 <link rel="stylesheet" href="assets/css/animate.css">
 
		 <!--flaticon.css-->
		 <link rel="stylesheet" href="assets/css/flaticon.css">
 
		 <!--slick.css-->
		 <link rel="stylesheet" href="assets/css/slick.css">
		 <link rel="stylesheet" href="assets/css/slick-theme.css">
		 
		 <!--bootstrap.min.css-->
		 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		 
		 <!-- bootsnav -->
		 <link rel="stylesheet" href="assets/css/bootsnav.css" >	
		 
		 <!--style.css-->
		 <link rel="stylesheet" href="assets/css/style.css">
		 
		 <!--responsive.css-->
		 <link rel="stylesheet" href="assets/css/responsive.css">
	</head>

	<body>
		<!--header-top start -->
		<header id="header-top" class="header-top">
			<ul>
				<li>
					<div class="header-top-left">
						<ul>
							<li class="select-opt">
								<select name="language" id="language">
									<option value="default">EN</option>
									<option value="Bangla">BN</option>
									<option value="Arabic">AB</option>
								</select>
							</li>
							
						</ul>
					</div>
				</li>
				<li class="head-responsive-right pull-right">
					<div class="header-top-right">
						<ul>
							<li class="header-top-contact">
								<a href="login.php">sign in</a>
							</li>
							<li class="header-top-contact">
								<a href="register.php">register</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
					
		</header><!--/.header-top-->
		

		<section class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href="index.php">list<span>race</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                    <li class="active"><a href="index.php">home</a></li>
			                    <li><a href="service.php">Services</a></li>
			                    <li><a href="explore.php">explore</a></li>
			                    <li><a href="contact.php">contact</a></li>
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->

		<div class="wrapper" style="background-image: url('./assets/images/explore/e6.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="./assets/images/explore/e6.jpg" alt="">
				</div>
				<form action="register.php" method="post">
					<h3>Registration Form</h3>
					<div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" id="nom" name="nom">
						<input type="text" placeholder="Last Name" class="form-control" id="prenom" name="prenom">
					</div>
                    <div class="form-wrapper">
                        <input type="text" placeholder="Email Address" class="form-control" id="e_mail" name="e_mail">
                        <i class="zmdi zmdi-email"></i>
                        <p class="explore-price mb-2" > <?php echo $msg_mail ?> </p>
                    </div>
                    <div class="form-wrapper">
                        <input type="password" placeholder="Password" class="form-control" id="password" name="password">
                        <i class="zmdi zmdi-lock"></i>
                    </div>
                    <div class="form-wrapper">
                        <input type="password" placeholder="Confirm Password" class="form-control" name="confirm_password">
                        <i class="zmdi zmdi-lock"></i>
                        <p class="explore-price"> <?php  echo $msg_password?> </p>
                    </div>

					<div class="form-wrapper">

                        <input type="text" placeholder="adresse" class="form-control" name="adresse" id="adresse">
                        <i class="zmdi zmdi-account"></i>
                    </div>
					<div class="form-wrapper">
						<select name="pays" id="pays" class="form-control">
							<option value="" disabled selected>pays</option>
                            <?php
                            foreach ($allpays as $pays)
                            {
                            ?>
							<option value="<?php echo  $pays?>"><?php echo  $pays?></option>
                            <?php } ?>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
                    <div class="form-group">
                        <input type="text" placeholder="ville" class="form-control" id="ville" name="ville">
                        <input type="text" placeholder="5552455245" class="form-control" id="tel" name="tel">
                    </div>

					<button type="submit" name="ajouter" class="welcome-hero-btn" >Register</button>
				</form>
			</div>
		</div>

		
		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	<div class="col-sm-3">
			           		 <div class="navbar-header">
				                <a class="navbar-brand" href="index.php">list<span>race</span></a>
				            </div><!--/.navbar-header-->
			           	</div>
			           	<div class="col-sm-9">
			           		<ul class="footer-menu-item">
			                    <li class="scroll"><a href="service.php">Services</a></li>
			                    <li class="scroll"><a href="explore.php">explore</a></li>
			                    <li class="scroll"><a href="contact.php">contact</a></li>
			                    <li class=" scroll"><a href="login.php">my account</a></li>
			                </ul><!--/.nav -->
			           	</div>
		           </div>
				</div>
				<div class="hm-footer-copyright">
					<div class="row">
						
						<div class="col-sm-7">
							<div class="footer-social">
								<span><i class="fa fa-phone"> +1  (222) 777 8888</i></span>
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
					</div>
					
				</div><!--/.hm-footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		
		
	</body>
</html>