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
}