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

		<div class="gtco-section">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 gtco-heading text-center">
						<h2>Rezultati glasanja</h2>
					</div>
				</div>
			</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <h2>Sortiranje</h2>
                            <button class="btn-success btn-lg" onclick="pronadji('asc')">Sortiraj rastuce</button>
                            <button class="btn-danger btn-lg" onclick="pronadji('desc')">Sortiraj opadajuce</button>
                        </div>
                        <div id="tabela">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="piechart" style="width: 900px; height: 500px;"></div>
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
        function pronadji(sort){
            $.ajax({
                url: 'kontroler.php?funkcija=sortiranjeglasanja&sort='+sort,
                success: function (data) {
                    let output = '';
                    let nizPodataka = JSON.parse(data);

                    output += '<table class="table table-hover">';
                    output += '<thead>';
                    output += '<tr>';
                    output += '<th>Nominovani</th>';
                    output += '<th>Kategorija</th>';
                    output += '<th>Broj glasova</th>';
                    output += '</tr>';
                    output += '</thead>';
                    output += '<tbody>';

                    $.each(nizPodataka,function (i,podatak) {
                        output += '<tr>';
                        output += '<td>'+podatak.imePrezime + '</td>';
                        output += '<td>'+podatak.nazivKategorije + '</td>';
                        output += '<td>'+podatak.brojGlasova + '</td>';
                        output += '</tr>';
                    });

                    output += '</tbody>';
                    output += '</table>';

                    $("#tabela").html(output);
                }
            })
        }

        pronadji('desc');

    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            let podaci = [];
            let header = ["Nominovani","Broj glasova"];

            podaci.push(header);

            $.ajax({
                url: 'kontroler.php?funkcija=sortiranjeglasanja&sort=desc',
                success: function (data) {
                    let output = '';
                    let nizPodataka = JSON.parse(data);

                    $.each(nizPodataka,function (i,podatak) {
                        let jedanRed = [podatak.imePrezime,parseInt(podatak.brojGlasova)];
                        podaci.push(jedanRed);
                    });

                    var podaciZaChart = google.visualization.arrayToDataTable(podaci);
                    var options = {
                        title: 'Glasovi po nominovanom',
                        is3D: true
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(podaciZaChart, options);
                }
            })


        }
    </script>

	</body>
</html>

