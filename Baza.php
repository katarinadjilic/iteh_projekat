<?php
class Baza
{
    private $mysqli;

    /**
     * Baza constructor.
     */
    public function __construct()
    {
        $this->mysqli = new Mysqli('localhost','root','','grammy');
        $this->mysqli->set_charset('utf8');
    }

    public function ocistiOdSqlInjectiona($atribut)
    {
        return $this->mysqli->real_escape_string($atribut);
    }

    public function login($username, $password)
    {
        $upit = "SELECT * FROM korisnik k join rola r on k.rolaID = r.rolaID WHERE username = '".$username."' AND password='".$password."' LIMIT 1";
        $rezultat = $this->mysqli->query($upit);
        while ($red = $rezultat->fetch_object()){
            return new Korisnik($red->korisnikID,$red->imePrezime,$red->username,$red->password, new Rola($red->rolaID,$red->nazivRole));
        }
        return null;
    }

    public function vratiSveKategorije()
    {
        $niz = [];
        $upit = "SELECT * FROM kategorija";
        $rezultat = $this->mysqli->query($upit);
        while ($red = $rezultat->fetch_object()){
            $niz[] =  new Kategorija($red->kategorijaID,$red->nazivKategorije,$red->opisKategorije);
        }
        return $niz;
    }

    public function vratiSveOsobe()
    {
        $niz = [];
        $upit = "SELECT * FROM osoba";
        $rezultat = $this->mysqli->query($upit);
        while ($red = $rezultat->fetch_object()){
            $niz[] =  new Osoba($red->osobaID,$red->imePrezime,$red->datumRodjenja,$red->opis);
        }
        return $niz;
    }

    public function registracija($imePrezime, $usernameRegistraicija, $passwordRegistraicija)
    {
        $upit = "INSERT INTO korisnik(imePrezime,username,password) VALUES ('".$imePrezime."','".$usernameRegistraicija."','".$passwordRegistraicija."')";
        return $this->mysqli->query($upit);
    }

}