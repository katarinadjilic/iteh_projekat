<?php
session_start();
if(!isset($_SESSION['ulogovaniKorisnik'])){
    $_SESSION['ulogovaniKorisnik'] = [];
    $_SESSION['ulogovan'] = false;
    $_SESSION['admin'] = false;
}