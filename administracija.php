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
    <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery-ui.css">

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
						<h2>Administrcija</h2>
                        <p id="poruke"></p>
					</div>
				</div>
			</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="tabela">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="osobaID">Nominovani ID</label>
                        <input type="text" id="osobaID" class="form-control" disabled>
                        <label for="imePrezime">Ime prezime nominovog</label>
                        <input type="text" id="imePrezime" class="form-control" >
                        <label for="datumRodjenja">Datum rodjenja</label>
                        <input type="text" id="datumRodjenja" class="form-control datepicker" >
                        <label for="opis">Opis</label>
                        <input type="text" class="form-control" id="opis">
                        <hr>
                        <button id="dugmeIzmena" class="btn-lg btn-primary" onclick="izmeni()">Izmeni podatke o nominovanom</button>
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
    <script src="js/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });


        function pronadji(){
            $.ajax({
                url: 'kontroler.php?funkcija=glasanja',
                success: function (data) {
                    let output = '';
                    let nizPodataka = JSON.parse(data);

                    output += '<table id="datatabela" class="table table-hover">';
                    output += '<thead>';
                    output += '<tr>';
                    output += '<th>Nominovani</th>';
                    output += '<th>Kategorija</th>';
                    output += '<th>Korisnik</th>';
                    output += '<th>Ucitaj nominovanog</th>';
                    output += '<th>Obrisi</th>';
                    output += '</tr>';
                    output += '</thead>';
                    output += '<tbody>';

                    $.each(nizPodataka,function (i,podatak) {
                        output += '<tr>';
                        output += '<td>'+podatak.imePrezime + '</td>';
                        output += '<td>'+podatak.nazivKategorije + '</td>';
                        output += '<td>'+podatak.imePrezimeKorisnika + '</td>';
                        output += '<td><button class="btn-success btn-lg" onclick="ucitajOsobu('+podatak.glasanjeID +')"> <span class="icon-search" aria-hidden="true"></span></button></td>';
                        output += '<td><button class="btn-danger btn-lg" onclick="obrisi('+podatak.glasanjeID +')"> <span class="icon-trash2" aria-hidden="true"></span></button></td>';
                        output += '</tr>';
                    });

                    output += '</tbody>';
                    output += '</table>';

                    $("#tabela").html(output);
                    $('#datatabela').DataTable();
                }
            })
        }

        pronadji();

        function ucitajOsobu(id) {
            $.ajax({
                url: 'kontroler.php?funkcija=ucitajOsobu&id='+id,
                success: function (data) {
                    let osoba = JSON.parse(data);
                    alert(data);
                    $("#osobaID").val(osoba.osobaID);
                    $("#imePrezime").val(osoba.imePrezime);
                    $("#datumRodjenja").val(osoba.datumRodjenja);
                    $("#opis").val(osoba.opis);
                }
            })
        }

    </script>
    <script>
        function izmeni() {
            let podaci = {
                osobaID : $("#osobaID").val(),
                imePrezime : $("#imePrezime").val(),
                datumRodjenja : $("#datumRodjenja").val(),
                opis : $("#opis").val()
            };

            let osobaID = $("#osobaID").val();
            if(osobaID != ''){
                $.ajax({
                    url : 'kontroler.php?funkcija=izmeniosobu',
                    type: 'POST',
                    data: podaci,
                    success: function (data) {
                        $("#poruke").html(data);
                    }
                })
            }else{
                $("#poruke").html("Morate ucitati osobu da biste menjali njene podatke");
            }
        }
    </script>

	</body>
</html>

