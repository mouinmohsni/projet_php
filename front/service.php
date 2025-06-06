<?php

include "../classes/Service.php";
include "../classes/Categorie.php";
session_start();

$user_id=null;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}


$limit = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;


$categries = new Categorie();
$lise_categories = $categries ->getAllCategoriesWithServiceCount();




$services = new Service();
$liste_services = $services->getAllServicesForUsers($limit ,$offset);


$totalServices = $services->countAllServices();
$totalPages = ceil($totalServices / $limit);


?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		
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
							<li class="select-opt">
								<select name="currency" id="currency">
									<option value="usd">USD</option>
									<option value="euro">Euro</option>
									<option value="bdt">BDT</option>
								</select>
							</li>
							<li class="select-opt">
								<a href="#"><span class="lnr lnr-magnifier"></span></a>
							</li>
						</ul>
					</div>
				</li>
                <li class="head-responsive-right pull-right">
                    <div class="header-top-right">
                        <?php if(is_null($user_id)) { ?>
                            <ul>
                                <li class="header-top-contact">
                                    <a href="login.php">sign in</a>
                                </li>
                                <li class="header-top-contact">
                                    <a href="register.php">register</a>
                                </li>
                            </ul>

                        <?php }else{ ?>
                            <ul>
                                <li class="header-top-contact">
                                    <a href="service_page/profil.php">mon compte</a>
                                </li>
                                <li class="header-top-contact">
                                    <a href="../back_office/pages/logout.php">deconnecter</a>
                                </li>
                            </ul>

                        <?php }?>
                    </div>
                </li>
			</ul>
					
		</header><!--/.header-top-->
		<!--header-top end -->

		<!-- top-area Start -->
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
                                <li ><a href="index.php">home</a></li>
                                <li class="active"><a href="service.php">Services</a></li>
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
		<!-- top-area End -->

		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">
			<div class="container">
				<div class="welcome-hero-txt">
					<h2>best place to find and explore <br> that all you need </h2>
					<p>
						Find Best Place, Restaurant, Hotel, Real State and many more think in just One click 
					</p>
				</div>
				<div class="welcome-hero-serch-box">
					<div class="welcome-hero-form">
						<div class="single-welcome-hero-form">
							<h3>what?</h3>
							<form action="index.php">
								<input type="text" placeholder="Ex: palce, resturent, food, automobile" />
							</form>
							<div class="welcome-hero-form-icon">
								<i class="flaticon-list-with-dots"></i>
							</div>
						</div>
						<div class="single-welcome-hero-form">
							<h3>location</h3>
							<form action="index.php">
								<input type="text" placeholder="Ex: london, newyork, rome" />
							</form>
							<div class="welcome-hero-form-icon">
								<i class="flaticon-gps-fixed-indicator"></i>
							</div>
						</div>
					</div>
					<div class="welcome-hero-serch">
						<button class="welcome-hero-btn" onclick="window.location.href='#'">
							 search  <i data-feather="search"></i> 
						</button>
					</div>
				</div>
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

        <section id="list-topics" class="list-topics">
            <div class="container">
                <div class="list-topics-content">
                    <ul>
                        <?php

                        while($categorie=$lise_categories->fetch()){



                            ?>
                            <li>
                                <div class="single-list-topics-content">
                                    <div class="single-list-topics-icon">
                                        <i class="<?php echo $categorie["image"] ?>"></i>
                                    </div>
                                    <h2><a href="service_page/nos_service.php?id=<?php echo $categorie['Categorie_id']?>"><?php echo $categorie["nom_categorie"] ?> </a></h2>
                                    <p><?php echo $categorie['service_count']?> Services</p>

                                </div>
                            </li>

                            <?php
                        }
                        ?>

                    </ul>
                </div>
            </div><!--/.container-->

        </section><!--/.list-topics-->
		<!--list-topics end-->



		<!--works end -->
        <section id="explore" class="explore">
            <div class="container">
                <div class="section-header">
                    <h2>explore</h2>
                    <p>Explore New place, food, culture around the world and many more</p>
                </div><!--/.section-header-->
                <div class="explore-content">
                    <div class="row">
                        <?php
                        while ($one_services = $liste_services->fetch()){
                            ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="single-explore-item">
                                    <div class="single-explore-img">
                                        <img src="../back_office/media/service/<?php echo $one_services['url_image']; ?>" alt="explore image">
                                        <div class="single-explore-img-info">
                                            <div class="single-explore-image-icon-box">
                                                <ul>
                                                    <li>
                                                        <div class="single-explore-image-icon">
                                                            <i class="fa fa-arrows-alt"></i>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="single-explore-image-icon">
                                                            <i class="fa fa-bookmark-o"></i>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-explore-txt bg-theme-2">
                                        <h2><a href="service_page/one_service.php?id=<?php echo $one_services['Service_Id']; ?>"><?php echo $one_services['nom']; ?></a></h2>
                                        <p class="explore-rating-price">
                                            <span class="explore-rating"><?php echo $one_services['rating']; ?></span>
                                            <a href="#"> <?php echo $one_services['ratings_count']; ?> ratings</a>
                                            <span class="explore-price-box">
                                                form
                                                <span class="explore-price"><?php echo $one_services["prix"];?>$</span>
                                            </span>
                                            <a href="#"><?php echo $one_services["nom_categorie"];?></a>
                                        </p>
                                        <div class="explore-person">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="explore-person-img">

                                                        <img src="../back_office/media/agence/<?php echo $one_services["logo"];?>" alt="explore person">

                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <p>
                                                        <?php echo $one_services["description"];?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>

                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <!-- Bouton "Précédent" -->
                        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?id=page=<?= $page - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <!-- Liens numérotés -->
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?id=page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <!-- Bouton "Suivant" -->
                        <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?id=page=<?= $page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>



            </div><!--/.container-->

        </section><!--/.explore-->

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
                                <li class="scroll"><a href="service.html">Services</a></li>
                                <li class="scroll"><a href="#explore">explore</a></li>
                                <li class="scroll"><a href="contact.php">contact</a></li>
                                <li class=" scroll"><a href="#contact">my account</a></li>
                            </ul><!--/.nav -->
                        </div>
		           </div>
				</div>

			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up "  data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="../assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="../assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="../assets/js/bootsnav.js"></script>

        <!--feather.min.js-->
        <script  src="../assets/js/feather.min.js"></script>

        <!-- counter js -->
		<script src="../assets/js/jquery.counterup.min.js"></script>
		<script src="../assets/js/waypoints.min.js"></script>

        <!--slick.min.js-->
        <script src="../assets/js/slick.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		     
        <!--Custom JS-->
        <script src="../assets/js/custom.js"></script>
        
    </body>
	
</html>