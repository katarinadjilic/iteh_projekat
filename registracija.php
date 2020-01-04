<?php
include "autoload.php";
$poruka ="";
if(isset($_GET['poruka'])){
    $poruka = $_GET['poruka'];
}
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

		<div class="gtco-section">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 gtco-heading text-center">
						<h2>Forma za registraciju</h2>
						<p>Potrebno je ulogovati se da biste glasali</p>
                        <?php
                            if($poruka != ''){

                                ?>
                            <div class="alert alert-info" role="alert">
                                <?php echo $poruka; ?>
                            </div>
                        <?php
                            }
                        ?>

					</div>
				</div>
                <div class="row">
                    <form method="POST" action="kontroler.php?funkcija=registracija">
                        <label for="imeIPrezime">Ime i prezime</label>
                        <input type="text" name="imeIPrezime" class="form-control" required>
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <hr>
                        <input type="submit" class="btn-primary btn-lg" name="registracija" value="Registruj se">
                    </form>
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

	</body>
</html>

