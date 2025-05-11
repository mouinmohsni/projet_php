<?php
session_start();
$user_id=null;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
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
                        div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                            <li><a href="index.php">home</a></li>
                            <li><a href="service.php">Services</a></li>
                            <li><a href="explore.php">explore</a></li>
                            <li class="active"><a href="contact.php">contact</a></li>
                        </ul><!--/.nav -->
                    </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->
		<!-- top-area End -->

		<!--subscription strat -->
		<section id="contact"  class="subscription">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2>
						do you want to add your business listing with us?
					</h2>
					<p>
						Listrace offer you to list your business with us and we very much able to promote your Business.
					</p>
				</div>
				<div class=" row d-flex">

					<div class="col-md-7 col-sm-6 map-wrapper">
                        <h3 class="widget-title">Our Location</h3>
                        <div id="google-map">	
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2629.8244187967434!2d10.187512274900593!3d36.89782476219195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd34cc25bd5aff%3A0x495e852ae57f3ff5!2sTEK-UP%20University!5e1!3m2!1sfr!2stn!4v1738861384850!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>

                        <div class="contact-infos">
                            <ul>
                                <li>987 Nay Yar Street, Analog Estate</li>
                                <li>Yangon 10440, Myanmar</li>
                                <li>Tel: 090-090-0880</li>
                                <li>Email: <a href="mailto:info@company.com">info@company.com</a></li>
                            </ul>
                        </div>
                    </div>


					<div class="col-sm-12">

						<div class="subscription-input-group">
                            <form name="contactform" id="contactform" action="#" method="post">
                                <p>
                                    <input name="name"  class="subscription-input-form-contact" type="text" id="name" placeholder="Your Name">
                                </p>
                                <p>
                                    <input name="email"  class="subscription-input-form-contact" type="text" id="email" placeholder="Your Email"> 
                                </p>
                                <p>
                                    <input name="subject"  class="subscription-input-form-contact" type="text" id="subject" placeholder="Subject"> 
                                </p>
                                <p>
                                    <textarea name="message"  class="subscription-input-form-area" id="message" placeholder="Message"></textarea>    
                                </p>
                                <input type="submit" class="appsLand-btn subscribe-btn" id="submit" value="Send Message">
                            </form>
                        </div>
						
					</div>	
					
				</div>
			</div>

		</section><!--/subscription-->	
		<!--subscription end -->

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
                                <?php if($user_id) { ?>
                                    <li class=" scroll"><a href="service_page/profil.php">mon compte</a></li>
                                <?php } ?>
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