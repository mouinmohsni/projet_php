<?php
session_start();

include "../../classes/Service.php";
include "../../classes/Categorie.php";
include "../../classes/Reservation.php";
include "../../classes/user.php";


if (!isset($_SESSION['user_id'])) {
    $user_id=null ;
    header( 'location:../index.php');
    exit();
}else{
    $user_id=$_SESSION['user_id'];
    $User = new User();
    $thisUser = $User ->getUserById($user_id);

}



$categries = new Categorie();
$lise_categories = $categries ->getAllCategoriesWithServiceCount();


$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$Reservation = new Reservation();

$all_reservation = $Reservation->getReservationByUser($user_id, $limit,$offset);
$totalReservation = $all_reservation->rowCount();
echo $totalReservation;
$totalPages = ceil($totalReservation / $limit);

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $Reservation->deleteReservationById($id);
    header("Location:profil.php");
    exit();
}
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
		<link rel="shortcut icon" type="image/icon" href="../assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="../assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="../assets/css/animate.css">

		<!--flaticon.css-->
        <link rel="stylesheet" href="../assets/css/flaticon.css">

		<!--slick.css-->
        <link rel="stylesheet" href="../assets/css/slick.css">
		<link rel="stylesheet" href="../assets/css/slick-theme.css">
		<link rel="stylesheet" href="../assets/css/templatemo-villa-agency.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="../assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="../assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="../assets/css/responsive.css">


        <!-- CSS Files -->
        <!-- Nepcha Analytics (nepcha.com) -->
        <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
        <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
        
    

    </head>
	
	<body>



    <!--header-top start -->
		<header id="header-top" class="header-top">
			<ul>
				<li>
					<div class="header-top-left">
						<ul>
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
			                <a class="navbar-brand" href="../index.php">list<span>race</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                                <li><a href="../index.php">home</a></li>
                                <li><a href="../service.php">Services</a></li>
                                <li><a href="../explore.php">explore</a></li>
                                <li><a href="../contact.php">contact</a></li>
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
				
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->
		<!--list-topics start -->
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
                                    <h2><a href="../service_page/nos_service.php?id=<?php echo $categorie['Categorie_id']?>"><?php echo $categorie["nom_categorie"] ?> </a></h2>
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

    <div class="single-property section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="main-content">
                        <div class="info-table">
                            <ul>
                                <li> <p>Nom     : <strong> <?php echo $thisUser['nom']; ?></strong></p></li>
                                <li><p>Prenom  : <strong> <?php echo $thisUser['prenom']; ?></strong></p></li>
                                <li><p>E-mail : <span><?php echo $thisUser['e_mail']; ?></span> </p></li>
                                <li><p>Adresse : <span><?php echo $thisUser['adresse']; ?></span> </p></li>
                            </ul>
                        </div>





                    </div>
                    <!-- Bouton qui déclenche le formulaire -->


                </div>

                <div class="col-lg-4">
                    <div class="info-table">
                        <ul>

                            <li>
                                <a href="update_profil.php" >
                                <img src="../assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                                <h4>modifier mes  information</span></h4>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4 marging-top">
        <div class="row justify-content-center"> <!-- ⬅ Centre la colonne -->
            <div class="col-lg-12"> <!-- ⬅ Largeur du tableau -->
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6 class="text-center">Ma liste de Reservation</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 text-nowrap">

                                <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Service</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Agence</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Départ</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Arrivée</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Départ</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Arrivée</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adultes</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Enfants</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prix Total</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date de reservation</th>
                                    <th class="text-secondary opacity-7"></th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while ($one_reservation = $all_reservation->fetch()) {?>
                                    <tr>
                                        <?php if($one_reservation['etat']=="en attente"){ ?>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-info"><?php echo $one_reservation['etat']; ?></span>
                                        </td>

                                        <?php }elseif($one_reservation['etat']=="valider"){?>

                                        <td>
                                            <span class="badge badge-sm bg-gradient-success"><?php echo $one_reservation['etat']; ?></span>
                                        </td>
                                        <?php }else { ?>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-danger"><?php echo $one_reservation['etat']; ?></span>
                                        </td>
                                        <?php } ?>


                                        <td><?php echo $one_reservation['nom']; ?></td>
                                        <td><?php echo $one_reservation['nom_agence']; ?></td>
                                        <td><?php echo $one_reservation['destination_depart']; ?></td>
                                        <td><?php echo $one_reservation['destination_arriver']; ?></td>

                                        <td><?php echo $one_reservation['date_debut']; ?></td>
                                        <td><?php echo $one_reservation['date_fin']; ?></td>
                                        <td><?php echo $one_reservation['nombre_adulte']; ?></td>
                                        <td><?php echo $one_reservation['nombre_enfants']; ?></td>
                                        <td><?php echo $one_reservation['prix']; ?></td>
                                        <td><?php echo $one_reservation['date_reservation']; ?></td>
                                        <td>

                                            <a href="update_one_service.php?Service_Id=<?php echo $one_reservation['Service_Id']; ?>&Reservation_Id=<?php echo $one_reservation['Reservation_Id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" title="Edit">Edit</a>
                                        </td>
                                        <td>
                                            <a href="?id=<?php echo $one_reservation['Reservation_Id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" title="Delete">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>















        <!-- Formulaire de réservation caché -->


		

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	<div class="col-sm-3">
			           		 <div class="navbar-header">
				                <a class="navbar-brand" href="../index.php">list<span>race</span></a>
				            </div><!--/.navbar-header-->
			           	</div>
                        <div class="col-sm-9">
                            <ul class="footer-menu-item">
                                <li class="scroll"><a href="../service.php">Services</a></li>
                                <li class="scroll"><a href="../explore.php">explore</a></li>
                                <li class="scroll"><a href="../contact.php">contact</a></li>
                                <?php if($user_id) { ?>
                                    <li class=" scroll"><a href="profil.php">mon compte</a></li>
                                <?php } ?>
                            </ul><!--/.nav -->
                        </div>
		           </div>
				</div>

			</div><!--/.container-->


			
        </footer><!--/.footer-->
		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="../assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		
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