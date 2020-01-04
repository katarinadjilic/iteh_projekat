<?php
class Glasanje
{
    private $glasanjeID;
    private $korisnik;
    private $osoba;
    private $kategorija;

    /**
     * Glasanje constructor.
     * @param $glasanjeID
     * @param $korisnik
     * @param $osoba
     * @param $kategorija
     */
    public function __construct($glasanjeID, $korisnik, $osoba, $kategorija)
    {
        $this->glasanjeID = $glasanjeID;
        $this->korisnik = $korisnik;
        $this->osoba = $osoba;
        $this->kategorija = $kategorija;
    }


    /**
     * @return mixed
     */
    public function getGlasanjeID()
    {
        return $this->glasanjeID;
    }

    /**
     * @param mixed $glasanjeID
     */
    public function setGlasanjeID($glasanjeID)
    {
        $this->glasanjeID = $glasanjeID;
    }

    /**
     * @return mixed
     */
    public function getKorisnik()
    {
        return $this->korisnik;
    }

    /**
     * @param mixed $korisnik
     */
    public function setKorisnik($korisnik)
    {
        $this->korisnik = $korisnik;
    }

    /**
     * @return mixed
     */
    public function getOsoba()
    {
        return $this->osoba;
    }

    /**
     * @param mixed $osoba
     */
    public function setOsoba($osoba)
    {
        $this->osoba = $osoba;
    }

    /**
     * @return mixed
     */
    public function getKategorija()
    {
        return $this->kategorija;
    }

    /**
     * @param mixed $kategorija
     */
    public function setKategorija($kategorija)
    {
        $this->kategorija = $kategorija;
    }


}