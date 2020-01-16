<?php
include "autoload.php";
?>
<!DOCTYPE HTML>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Grammy glasanje</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400|Montserrat:400,700" rel="stylesheet">
	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/respond.min.js"></script>

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-sm-2 col-xs-12">
						<div id="gtco-logo"><a href="index.php"><img src="images/logo.png" class="img img-responsive"> </div>
					</div>
					<?php include 'meni.php' ?>
				</div>
				
			</div>
		</nav>

		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12">
					<div class="owl-carousel owl-carousel-fullwidth">
						<div class="item">
							<a href="#">
								<img src="images/1g.jpg" alt="Grammy prva slika">
								<div class="slider-copy">
									<h2>Grammy awards 2019</h2>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="#">
								<img src="images/4g.jpg" alt="Grammy druga slika">
								<div class="slider-copy">
									<h2>Grammy awards 2019</h2>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="#">
								<img src="images/3g.jpg" alt="Grammy treca slika">
								<div class="slider-copy">
									<h2>Grammy awards 2019</h2>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="gtco-section">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 gtco-heading text-center">
						<h2>Fan dana</h2>
                        <hr>

					</div>
				</div>
                <div class="row">
                    <div class="col-md-3">
                        <img id="slikaFana" class="img-responsive text-center" src="">

                    </div>
                    <div class="col-md-9">
                        <h3 id="ime"></h3>
                        <p id="brGodina"></p>
                        <p id="ulica"></p>
                        <p id="email"></p>
                    </div>
                </div>
			</div>
		</div>

        <?php include 'futer.php'; ?>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
    <script>
        $.ajax({
            url: 'https://randomuser.me/api/',
            dataType: 'json',
            success: function(data) {
                let osoba = data.results[0];

                let imePrezime = osoba.name.first + ' '+osoba.name.last;
                let email = osoba.email;
                let slikaUrl = osoba.picture.large;
                let brojGodina = osoba.dob.age + ' godina';
                let ulica = osoba.location.street.name + ','+osoba.location.street.number

                $("#ime").html(imePrezime);
                $("#email").html(email);
                $("#brGodina").html(brojGodina);
                $("#ulica").html(ulica);
                $("#slikaFana").attr('src', slikaUrl);

            }
        });
    </script>

	</body>
</html>

