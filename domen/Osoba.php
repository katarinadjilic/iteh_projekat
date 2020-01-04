<?php
class Osoba implements JsonSerializable
{
    private $osobaID;
    private $imePrezime;
    private $datumRodjenja;
    private $opis;

    /**
     * Osoba constructor.
     * @param $osobaID
     * @param $imePrezime
     * @param $datumRodjenja
     * @param $opis
     */
    public function __construct($osobaID, $imePrezime, $datumRodjenja, $opis)
    {
        $this->osobaID = $osobaID;
        $this->imePrezime = $imePrezime;
        $this->datumRodjenja = $datumRodjenja;
        $this->opis = $opis;
    }

    /**
     * @return mixed
     */
    public function getOsobaID()
    {
        return $this->osobaID;
    }

    /**
     * @param mixed $osobaID
     */
    public function setOsobaID($osobaID)
    {
        $this->osobaID = $osobaID;
    }

    /**
     * @return mixed
     */
    public function getImePrezime()
    {
        return $this->imePrezime;
    }

    /**
     * @param mixed $imePrezime
     */
    public function setImePrezime($imePrezime)
    {
        $this->imePrezime = $imePrezime;
    }

    /**
     * @return mixed
     */
    public function getDatumRodjenja()
    {
        return $this->datumRodjenja;
    }

    /**
     * @param mixed $datumRodjenja
     */
    public function setDatumRodjenja($datumRodjenja)
    {
        $this->datumRodjenja = $datumRodjenja;
    }

    /**
     * @return mixed
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * @param mixed $opis
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;
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