<?php
include "autoload.php";
if(!isset($_GET['funkcija'])){
    die("Funkcija mora biti definisana");
}
$funkcija = $_GET['funkcija'];

switch ($funkcija){
    case 'login':
        $username = $baza->ocistiOdSqlInjectiona($_POST['username']);
        $password = $baza->ocistiOdSqlInjectiona($_POST['password']);
        $ulogovaniKorisnik = $baza->login($username,$password);
        if($ulogovaniKorisnik){
            $_SESSION['ulogovaniKorisnik'] = $ulogovaniKorisnik;
            $_SESSION['ulogovan'] = true;
            $_SESSION['admin'] = $ulogovaniKorisnik->getRola()->getNazivRole() == 'Administrator';
            header("Location: index.php");
        }else{
            header("Location: login.php?poruka=Neuspesno logovanje,proverite username i password");
        }
        break;
    case 'kategorije':
        $kategorije = $baza->vratiSveKategorije();
        echo json_encode($kategorije);
        break;
    case 'osobe':
        $osobe = $baza->vratiSveOsobe();
        echo json_encode($osobe);
        break;
    case 'registracija':
        $imePrezime = $baza->ocistiOdSqlInjectiona($_POST['imeIPrezime']);
        $usernameRegistraicija = $baza->ocistiOdSqlInjectiona($_POST['username']);
        $passwordRegistraicija = $baza->ocistiOdSqlInjectiona($_POST['password']);
        $uspesno = $baza->registracija($imePrezime,$usernameRegistraicija,$passwordRegistraicija);
        if($uspesno){
           header("Location: registracija.php?poruka=Uspesno registrovan korisnik");
        }else{
            header("Location: registracija.php?poruka=Neuspesno registracija");
        }
        break;
    case 'sortiranjeglasanja':
        $rezultati = $baza->rezultatiGlasanja($_GET['sort']);
        echo json_encode($rezultati);
        break;
    case 'glasanja':
        $rezultati = $baza->svaGlasanja();
        echo json_encode($rezultati);
        break;
    case 'ucitajOsobu':
        $rez = $baza->ucitajOsobu($_GET['id']);
        echo json_encode($rez);
        break;
    case 'izmeniosobu':
        $imePrezime = $baza->ocistiOdSqlInjectiona($_POST['imePrezime']);
        $datumRodjenja = $baza->ocistiOdSqlInjectiona($_POST['datumRodjenja']);
        $opis = $baza->ocistiOdSqlInjectiona($_POST['opis']);
        $osobaID = $baza->ocistiOdSqlInjectiona($_POST['osobaID']);
        $uspesno = $baza->izmeniOsobu($imePrezime,$datumRodjenja,$opis,$osobaID);
        if($uspesno){
            echo("Uspesno izmenjeni podaci o osobi");
        }else{
            echo("Doslo je do greske prilikom izmene podataka");
        }
        break;

}