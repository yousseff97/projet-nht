<?php
session_start();

include "IncludeClasses/AutoLoad.php";
include "IncludeClasses/Afficher.php";


?>




<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">

	<title>Homepage</title>
	<link rel="icon" href="favicon.png" type="image/png">
	<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="css/responsive.css" rel="stylesheet" type="text/css">
	<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="js/jquery.1.8.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.js"></script>
	<script type="text/javascript" src="js/wow.js"></script>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/magnific-popup.js"></script>











    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>






   <script>
        function dialog(value) {


            $.alert({
                title: 'Instruction',
                content: value,

            });

        };








    </script>

</head>

<body>
	<header class="header" id="header">
		<!--header-start-->
		<div class="container">
			<figure class="logo animated fadeInDown delay-07s">
				<a href="#"><img src="img/logotrans.png" alt="" style="width: 500px"></a>
			</figure>
			<h1 class="animated fadeInDown delay-07s">Bienvenus chez New Hospital Technologies</h1>
			<ul class="we-create animated fadeInUp delay-1s">
				<li>la qualité fait la difference sur le marché</li>
			</ul>
			<a class="link animated fadeInUp delay-1s servicelink" href="#produit">Commencer</a>
		</div>
	</header>
	<!--header-end-->

	<nav class="main-nav-outer" id="test">
		<!--main-nav-start-->
		<div class="container">
			<ul class="main-nav">
				<li><a href="#header">Accueil</a></li>
				<li><a href="#produit">Produits</a></li>
				<li><a href="#service">Services</a></li>
				<li class="small-logo"><a href="#header"><img src="img/small-logo.png" alt=""></a></li>
                <li><a href="panier.php">Panier</a></li>
				<li><a href="#propos">À propos</a></li>
				<li><a href="#contact">contact</a></li>
			</ul>
			<a class="res-nav_click" href="#"><i class="fa fa-bars"></i></a>
		</div>
	</nav>





	<section class="main-section paddind" id="produit">
		<!--main-section-start-->
		<div class="container">
			<h2>Produits</h2>
			<h6>Tous les produits vendus chez New Hospital Technologies.</h6>


		</div>
		<div class="portfolioContainer wow fadeInUp delay-04s">
			<?php generateProd() ?>

		</div>
	</section>




	<section class="main-section" id="service" style="background-color: #fafafa">

		<div class="container">
			<h2>Services</h2>
			<h6>Nous offrons un service exceptionnel avec des câlins gratuits.</h6>
			<div class="row">

				<div class="col-lg-4 col-sm-6 wow fadeInLeft delay-05s">
                    <?php generateServ() ?>
				</div>
				<figure class="col-lg-8 col-sm-6  text-right wow fadeInUp delay-02s">
					<img src="img/macbook-pro.png" alt="">
				</figure>

			</div>
		</div>
	</section>


	<section class="main-section team" id="propos">
		<!--main-section team-start-->
		<div class="container">
			<h2>Qui Somme-Nous?</h2>

			<div class="team-leader-block clearfix" >
				<div class="team-leader-box">
					<div class="team-leader wow fadeInDown delay-03s">
						<div class="team-leader-shadow"></div>
						<img src="img/team-leader-pic1.jpg" alt="">
						<ul>
							<li><a href="#" class="fa fa-twitter"></a></li>
							<li><a href="#" class="fa fa-facebook"></a></li>
							<li><a href="#" class="fa fa-pinterest"></a></li>
							<li><a href="#" class="fa fa-google-plus"></a></li>
						</ul>
					</div>
					<h3 class="wow fadeInDown delay-03s">hakiri brahim</h3>
					<span class="wow fadeInDown delay-03s">Chief Executive Officer</span>
					<p class="wow fadeInDown delay-03s">..............</p>
				</div>

				<div >
					.........
				</div>
			</div>
		</div>
	</section>
	<!--main-section team-end-->



	<section class="business-talking">
		<!--business-talking-start-->
		<div class="container">
			<h2>Parlons Business.</h2>
		</div>
	</section>
	<!--business-talking-end-->
	<div class="container">
		<section class="main-section contact" id="contact">

			<div class="row">
				<div class="col-lg-6 col-sm-7 wow fadeInLeft">
					<div class="contact-info-box address clearfix">
						<h3><i class=" icon-map-marker"></i>Address:</h3>
						<span>24 bis rue daghbaji<br>1001 tunis</span>
					</div>
					<div class="contact-info-box phone clearfix">
						<h3><i class="fa fa-phone"></i>Tel</h3>
						<span>+216 98975915</span>
					</div>
					<div class="contact-info-box email clearfix">
						<h3><i class="fa fa-pencil"></i>email:</h3>
						<span>manager@nht.com.tn</span>
					</div>
					<div class="contact-info-box hours clearfix">
						<h3><i class="fa fa-clock-o"></i>Heures de travail</h3>
						<span><strong>Lundi-Samedi</strong> 8am - 6pm<br></span>
					</div>
					<ul class="social-link">
						<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
						<li class="gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li class="dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-5 col-sm-5 wow fadeInUp delay-05s">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3195.0353394271533!2d10.182382515289719!3d36.793703079949964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd34131cf1e549%3A0x27fa7c75fa33a05c!2s24+Rue+Daghbagi%2C+Tunis!5e0!3m2!1sfr!2stn!4v1529005770544" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
			</div>
		</section>
	</div>
	<footer class="footer">
		<div class="container">
			<div class="footer-logo"><a href="#"><img src="img/footer-logo.png" alt=""></a></div>
			<span class="copyright">&copy; NHT2018.GALMAMI Oussama<br>All Rights Reserved</span>
				<!--<div class="credits">

				Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
			</div>-->
		</div>
	</footer>


	<script type="text/javascript">
		$(document).ready(function(e) {

			$('#test').scrollToFixed();
			$('.res-nav_click').click(function() {
				$('.main-nav').slideToggle();
				return false

			});

      $('.Portfolio-box').magnificPopup({
        delegate: 'a',
        type: 'image'
      });

		});
	</script>

	<script>
		wow = new WOW({
			animateClass: 'animated',
			offset: 100
		});
		wow.init();
	</script>


	<script type="text/javascript">
		$(window).load(function() {

			$('.main-nav li a, .servicelink').bind('click', function(event) {
				var $anchor = $(this);

				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top - 102
				}, 1500, 'easeInOutExpo');
				/*
				if you don't want to use the easing effects:
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1000);
				*/
				if ($(window).width() < 768) {
					$('.main-nav').hide();
				}
				event.preventDefault();
			});
		})
	</script>

	<script type="text/javascript">
		$(window).load(function() {


			var $container = $('.portfolioContainer'),
				$body = $('body'),
				colW = 375,
				columns = null;


			$container.isotope({
				// disable window resizing
				resizable: true,
				masonry: {
					columnWidth: colW
				}
			});

			$(window).smartresize(function() {
				// check if columns has changed
				var currentColumns = Math.floor(($body.width() - 30) / colW);
				if (currentColumns !== columns) {
					// set new column count
					columns = currentColumns;
					// apply width to container manually, then trigger relayout
					$container.width(columns * colW)
						.isotope('reLayout');
				}

			}).smartresize(); // trigger resize to set container width
			$('.portfolioFilter a').click(function() {
				$('.portfolioFilter .current').removeClass('current');
				$(this).addClass('current');

				var selector = $(this).attr('data-filter');
				$container.isotope({

					filter: selector,
				});
				return false;
			});

		});
	</script>


</body>

</html>
