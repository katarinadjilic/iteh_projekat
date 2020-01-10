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

    public function rezultatiGlasanja($sort)
    {
        $upit = "SELECT o.imePrezime,k.nazivKategorije, count(g.glasanjeID) as brojGlasova fROM glasanje g JOIN osoba o on g.osobaID = o.osobaID JOIN kategorija k on g.kategorijaID = k.kategorijaID GROUP BY g.osobaID ORDER by count(g.glasanjeID) ".$sort;
        $niz = [];
        $rezultat = $this->mysqli->query($upit);
        while ($red = $rezultat->fetch_object()){
            $niz[] =  $red;
        }
        return $niz;
    }

    public function brojGlassovaZaKorisnika($korisnikID)
    {
        $upit = "SELECT count(g.glasanjeID) as brojGlasova fROM glasanje g JOIN korisnik k on g.korisnikID = k.korisnikID GROUP BY g.korisnikID HAVING g.korisnikID = ".$korisnikID;
        $rezultat = $this->mysqli->query($upit);
        while ($red = $rezultat->fetch_object()){
            return $red->brojGlasova;
        }
        return 0;
    }
    public function brojGlassovaPoOsobi($osobaID)
    {
        $upit = "SELECT count(g.glasanjeID) as brojGlasova fROM glasanje g JOIN osoba o on g.osobaID = o.osobaID GROUP BY g.osobaID HAVING g.osobaID = ".$osobaID;
        $rezultat = $this->mysqli->query($upit);
        while ($red = $rezultat->fetch_object()){
            return $red->brojGlasova;
        }
        return 0;
    }

    public function glasaj($niz)
    {
        $korisnikID = $niz['korisnikID'];
        $osobaID = $niz['osobaID'];
        $kategorijaID = $niz['kategorijaID'];
        $upit = "INSERT INTO glasanje(korisnikID,osobaID,kategorijaID) VALUES (".$korisnikID.",".$osobaID.",".$kategorijaID.")";
        return $this->mysqli->query($upit);
    }

    public function svaGlasanja()
    {
        $upit = "SELECT o.imePrezime,kor.imePrezime as imePrezimeKorisnika, k.nazivKategorije, g.glasanjeID fROM glasanje g JOIN osoba o on g.osobaID = o.osobaID JOIN kategorija k on g.kategorijaID = k.kategorijaID  join korisnik kor on g.korisnikID = kor.korisnikID";
        $niz = [];
        $rezultat = $this->mysqli->query($upit);
        while ($red = $rezultat->fetch_object()){
            $niz[] =  $red;
        }
        return $niz;
    }

    public function ucitajOsobu($id)
    {
        $upit = "SELECT * FROM osoba WHERE osobaID= ".$id;
        $rezultat = $this->mysqli->query($upit);
        while ($red = $rezultat->fetch_object()){
            return new Osoba($red->osobaID,$red->imePrezime,$red->datumRodjenja,$red->opis);
        }
        return null;
    }
}