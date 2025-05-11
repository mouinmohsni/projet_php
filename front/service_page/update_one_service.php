<?php
session_start();

include "../../classes/Service.php";
include "../../classes/Categorie.php";
include "../../classes/Reservation.php";
include "../../classes/user.php";



if (!isset($_SESSION['user_id'])) {
    $user_id=null ;
}else{
    $user_id=$_SESSION['user_id'];
    $User = new User();
    $thisUser = $User ->getUserById($user_id);

}

$categries = new Categorie();
$lise_categories = $categries ->getAllCategoriesWithServiceCount();

if (isset($_GET["Reservation_Id"])){
    $Reservation_Id=$_GET["Reservation_Id"];
}
if(isset($_GET["Service_Id"])){
    $Service_Id=$_GET["Service_Id"];
}
$Services = new Service();
$infoService = $Services -> getServiceById($Service_Id);

$Reservation = new Reservation();
$thisReservation = $Reservation -> getReservationById($Reservation_Id);
var_dump($thisReservation);


if(isset($_POST['update_reservation'])){

    file_put_contents('debug.log', print_r($_POST, true));
    $Reservation->updateReservation($_POST);
    header("Location:profil.php");
    exit();
}

if (isset($_POST["add_rating"])){}


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
                                <li ><a href="../index.php">home</a></li>
                                <li class="active"><a href="../service.php">Services</a></li>
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
                        <div class="main-image">
                            <img src="../../back_office/media/service/<?php echo $infoService['url_image']; ?>" alt="">
                        </div>
                        <div class="main-content">
                            <span class="category"> <?php echo $infoService['nom_categorie']; ?> </span>
                            <h4> <?php echo $infoService['nom']; ?></h4>
                            <p>Adresse : <span><?php echo $infoService['adresse']; ?></span> </p>
                            <p> <strong> <?php echo $infoService['description']; ?></strong></p>
                    </div>
                    <!-- Bouton qui déclenche le formulaire -->


                </div>

                <div class="col-lg-4">
                  <div class="info-table">
                    <ul>
                      <li>
                        <img src="../../back_office/media/agence/<?php echo $infoService['logo']; ?>" alt="logo agence" style="max-width: 52px; border-radius: 10%:">
                        <h4><?php echo $infoService['nom_agence']; ?></h4>
                      </li>
                      <li>
                        <img src="../assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                        <h4>prix par personne :<br><span><?php echo $infoService['prix']; ?></span></h4>
                      </li>
                      <li>
                        <img src="../assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                        <h4>Note global<br><span><?php echo $infoService['rating']; ?></span></h4>
                      </li>
                      <li>
                        <h4>Noter<br><span>24/7 Under Control</span></h4>
                          <form action="one_service.php?id=<?php echo $Service_Id; ?>" method="POST">
                              <div class="star-rating">
                                  <input type="hidden" name="Service_Id" value="<?php echo $Service_Id; ?>">
                                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">


                                  <input type="radio" name="rating" value="5" id="5"><label for="5">★</label>
                                  <input type="radio" name="rating" value="4" id="4"><label for="4">★</label>
                                  <input type="radio" name="rating" value="3" id="3"><label for="3">★</label>
                                  <input type="radio" name="rating" value="2" id="2"><label for="2">★</label>
                                  <input type="radio" name="rating" value="1" id="1"><label for="1">★</label>
                                  <button type="submit" name="add_rating">Noter</button>
                              </div>
                          </form>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>



        <!-- Formulaire de réservation caché -->
            <div class=" mt-4" >
                <div class="tab-content">
                    <div  class="tab-pane active fade in" id="tours">
                        <div class="tab-para">
                            <form action="update_one_service.php?Service_Id=<?php echo $Service_Id; ?>&Reservation_Id=<?php echo $thisReservation['Reservation_Id']; ?>" method="POST">
                                <div class="row">

                                    <div class="col-lg-2 col-md-3 col-sm-4">
                                        <div class="single-tab-select-box">

                                            <div >
                                                <input type="hidden" name="etat"  data-toggle="datepicker" id="user_id"  value="<?php echo $thisReservation['etat']; ?>">

                                                <input type="hidden" name="Reservation_Id"  data-toggle="datepicker" id="user_id"  value="<?php echo $thisReservation['Reservation_Id']; ?>">
                                                <input type="hidden" name="Service_Id" value="<?php echo $Service_Id; ?>">
                                                <input type="hidden" name="destination_depart"  data-toggle="datepicker" id="destination_depart" value="<?php echo $infoService['adresse']; ?>">
                                                <input type="hidden" name="destination_arriver"  data-toggle="datepicker" id="destination_arriver" value="<?php echo $thisUser['ville'];?>">
                                                <input type="hidden" name="user_id"  data-toggle="datepicker" id="user_id" value="<?php echo$user_id ; ?>">
                                                <input type="hidden" name="prix"  data-toggle="datepicker" id="user_id"  value="<?php echo $infoService['prix']; ?>">
                                            </div><!-- /.travel-select-icon -->
                                        </div><!--/.single-tab-select-box-->
                                    </div><!--/.col-->

                                    <div class="col-lg-2 col-md-3 col-sm-4">
                                        <div class="single-tab-select-box">
                                            <h2>check in</h2>
                                            <div class="travel-check-icon">
                                                <input type="date" name="date_debut" class="form-control" data-toggle="datepicker"  value="<?php echo $thisReservation['date_debut']; ?>">
                                            </div><!-- /.travel-check-icon -->
                                        </div><!--/.single-tab-select-box-->
                                    </div><!--/.col-->

                                    <div class="col-lg-2 col-md-3 col-sm-4">
                                        <div class="single-tab-select-box">
                                            <h2>check out</h2>
                                            <div class="travel-check-icon">
                                                <input type="date" name="date_fin" class="form-control"  data-toggle="datepicker" value="<?php echo $thisReservation['date_fin']; ?>" >
                                            </div><!-- /.travel-check-icon -->
                                        </div><!--/.single-tab-select-box-->
                                    </div><!--/.col-->

                                    <div class="col-lg-2 col-md-1 col-sm-4">
                                        <div class="single-tab-select-box">
                                            <h2>Adult</h2>
                                            <div class="travel-select-icon">
                                                <select class="form-control " name="nombre_adulte">
                                                    <?php
                                                    $selectedValue = $thisReservation['nombre_adulte'];
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        $selected = ($i == $selectedValue) ? 'selected' : '';
                                                        echo "<option value=\"$i\" $selected>$i</option>";
                                                    }   ?>

                                                </select><!-- /.select-->
                                            </div><!-- /.travel-select-icon -->
                                        </div><!--/.single-tab-select-box-->
                                    </div><!--/.col-->

                                    <div class="col-lg-2 col-md-1 col-sm-4">
                                        <div class="single-tab-select-box">
                                            <h2>children's</h2>
                                            <div class="travel-select-icon">
                                                <select class="form-control " name="nombre_enfants">

                                                    <?php
                                                    $selectedValue_2 = $thisReservation['nombre_enfants'];
                                                    for ($i = 0; $i <= 5; $i++) {
                                                        $selected_2 = ($i == $selectedValue_2) ? 'selected' : '';
                                                        echo "<option value=\"$i\" $selected_2>$i</option>";
                                                    }   ?>

                                                </select><!-- /.select-->
                                            </div><!-- /.travel-select-icon -->
                                        </div><!--/.single-tab-select-box-->
                                    </div><!--/.col-->
                                </div><!--/.row-->
                                <div class="row">
                                    <div  class="center-bt">

                                        <button class="welcome-hero-btn " type="submit" name="update_reservation">
                                            Réserver
                                        </button>

                                    </div>
                                </div><!--/.row-->

                            </form>
                        </div><!--/.tab-para-->
                    </div><!--/.tabpannel-->
                </div><!--/.tab content-->
            </div>


		

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