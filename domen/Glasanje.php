<?php
class Glasanje implements JsonSerializable
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


    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}