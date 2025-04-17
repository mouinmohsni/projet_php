<?php
include "../../classes/Hotels.php";

$hotel = new Hotels();
$lise_hotel=$hotel->geAllhotels();
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
						<ul>
							<li class="header-top-contact">
								+1 222 777 6565
							</li>
							<li class="header-top-contact">
								<a href="../login.html">sign in</a>
							</li>
							<li class="header-top-contact">
								<a href="../login.html">register</a>
							</li>
						</ul>
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
			                <a class="navbar-brand" href="../index.html">list<span>race</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                    <li class=" scroll active"><a href="../index.html">home</a></li>
			                    <li class="scroll"><a href="../service.html">Services</a></li>
			                    <li class="scroll"><a href="../explore.html">explore</a></li>
			                    <li class="scroll"><a href="../contact.html">contact</a></li>
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
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-restaurant"></i>
								</div>
								<h2><a href="resturent.php">resturent</a></h2>
								<p>150 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-travel"></i>
								</div>
								<h2><a href="../service_page/destination.html">destination</a></h2>
								<p>214 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-building"></i>
								</div>
								<h2><a href="hotels.php">hotels</a></h2>
								<p>185 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-transport"></i>
								</div>
								<h2><a href="../service_page/automotion.html">automotion</a></h2>
								<p>120 listings</p>
							</div>
						</li>
					</ul>
				</div>
			</div><!--/.container-->

		</section><!--/.list-topics-->
		
		<!--works end -->
		<section id="explore" class="explore">
			<div class="container">
				<div class="section-header">
					<h2>Hotels</h2>
					<p>Explore New place, food, culture around the world and many more</p>
				</div><!--/.section-header-->
				

				<!-- ===================================================================== -->

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active fade in" id="tours">
						<div class="tab-para">

							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="single-tab-select-box">

										<h2>destination</h2>

										<div class="travel-select-icon">
											<select class="form-control ">

												  <option value="default">enter your destination country</option><!-- /.option-->

												  <option value="turkey">turkey</option><!-- /.option-->

												  <option value="russia">russia</option><!-- /.option-->
												  <option value="egept">egypt</option><!-- /.option-->

											</select><!-- /.select-->
										</div><!-- /.travel-select-icon -->

									</div><!--/.single-tab-select-box-->
								</div><!--/.col-->

								<div class="col-lg-2 col-md-3 col-sm-4">
									<div class="single-tab-select-box">
										<h2>check in</h2>
										<div class="travel-check-icon">
											<form action="#">
												<input type="text" name="check_in" class="form-control" data-toggle="datepicker" placeholder="12 -01 - 2017 ">
											</form>
										</div><!-- /.travel-check-icon -->
									</div><!--/.single-tab-select-box-->
								</div><!--/.col-->

								<div class="col-lg-2 col-md-3 col-sm-4">
									<div class="single-tab-select-box">
										<h2>check out</h2>
										<div class="travel-check-icon">
											<form action="#">
												<input type="text" name="check_out" class="form-control"  data-toggle="datepicker" placeholder="22 -01 - 2017 ">
											</form>
										</div><!-- /.travel-check-icon -->
									</div><!--/.single-tab-select-box-->
								</div><!--/.col-->

								<div class="col-lg-2 col-md-1 col-sm-4">
									<div class="single-tab-select-box">
										<h2>Adult</h2>
										<div class="travel-select-icon">
											<select class="form-control ">

												  <option value="2">2</option><!-- /.option-->
												  <option value="1">1</option><!-- /.option-->
												  <option value="2">2</option><!-- /.option-->
												  <option value="3">3</option><!-- /.option-->
												  <option value="4">4</option><!-- /.option-->
												  <option value="5">5</option><!-- /.option-->

											</select><!-- /.select-->
										</div><!-- /.travel-select-icon -->
									</div><!--/.single-tab-select-box-->
								</div><!--/.col-->

								<div class="col-lg-2 col-md-1 col-sm-4">
									<div class="single-tab-select-box">
										<h2>children's</h2>
										<div class="travel-select-icon">
											<select class="form-control ">

												  <option value="0">0</option><!-- /.option-->
												  <option value="3">1</option><!-- /.option-->
												  <option value="2">2</option><!-- /.option-->
												  <option value="3">3</option><!-- /.option-->
												  <option value="4">4</option><!-- /.option-->
												  <option value="5">5</option><!-- /.option-->

											</select><!-- /.select-->
										</div><!-- /.travel-select-icon -->
									</div><!--/.single-tab-select-box-->
								</div><!--/.col-->

							</div><!--/.row-->

							<div class="row">
								<div  class="center-bt">
								
									
										<button  class="welcome-hero-btn">
											search	
										</button><!--/.travel-btn-->
								

							</div><!--/.row-->

						</div><!--/.tab-para-->

					</div><!--/.tabpannel-->
				</div><!--/.tab content-->

				<!-- ============================================================================= -->






				<div class="explore-content">
					<div class="row">
						<?php
                        while ($one_hotel = $lise_hotel->fetch()){
                        ?>
						<div class="col-md-4 col-sm-6">
							<div class="single-explore-item">
								<div class="single-explore-img">
									<img src="../assets/images/<?php echo $one_hotel['url_image']; ?>" alt="explore image">
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
									<h2><a href="#"><?php echo $one_hotel['nom']; ?></a></h2>
									<p class="explore-rating-price">
										<span class="explore-rating"><?php echo $one_hotel['rating']; ?></span>
										<a href="#"> <?php echo $one_hotel['ratings_count']; ?> ratings</a>
										<span class="explore-price-box">
											form
											<span class="explore-price"><?php echo $one_hotel["prix"];?>$</span>
										</span>
										 <a href="#"><?php echo $one_hotel["nom_categorie"];?></a>
									</p>
									<div class="explore-person">
										<div class="row">
											<div class="col-sm-2">
												<div class="explore-person-img">
													<a href="#">
														<img src="../assets/images/explore/person.png" alt="explore person">
													</a>
												</div>
											</div>
											<div class="col-sm-10">
                                                    <?php echo $one_hotel["description"];?>
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
			</div><!--/.container-->

		</section><!--/.explore-->

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	<div class="col-sm-3">
			           		 <div class="navbar-header">
				                <a class="navbar-brand" href="index.html">list<span>race</span></a>
				            </div><!--/.navbar-header-->
			           	</div>
			           	<div class="col-sm-9">
                            <ul class="footer-menu-item">
                                <li class="scroll"><a href="service.html">Services</a></li>
                                <li class="scroll"><a href="#explore">explore</a></li>
                                <li class="scroll"><a href="contact.html">contact</a></li>
                                <li class=" scroll"><a href="#contact">my account</a></li>
                            </ul><!--/.nav -->
                        </div>
		           </div>
				</div>
				<div class="hm-footer-copyright">
					<div class="row">
						<div class="col-sm-5">
							<p>
								&copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a>
							</p><!--/p-->
						</div>
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
        <script src="../assets/js/custom.js"></script>F
        
    </body>
	
</html>