<?php
require 'flight/Flight.php';
require '../autoload.php';

Flight::register('db', $baza, array(''));

Flight::route('/', function(){
    echo 'Iteh seminarski';
});

Flight::route('GET /brojGlasovaZaKorisnika/@id', function($id){
    header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
    $rezultati = $db->brojGlassovaZaKorisnika($id);
    echo json_encode($rezultati);
});

Flight::route('GET /brojGlasovaPoOsobi/@id', function($id){
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    $rezultati = $db->brojGlassovaPoOsobi($id);
    echo json_encode($rezultati);
});

Flight::route('GET /kategorije', function(){
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    $rezultati = $db->vratiSveKategorije();
    echo json_encode($rezultati);
});

Flight::route('POST /glasaj', function()
{
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    $podaci = file_get_contents('php://input');
    $niz = json_decode($podaci,true);
    $uspesno = $db->glasaj($niz);
    if($uspesno)
    {
        echo (json_encode("Uspesno ste glasali"));
    }
    else
    {
        echo (json_encode("Neuspesno ste glasali"));
    }
});

Flight::start();
