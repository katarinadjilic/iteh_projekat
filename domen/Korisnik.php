<?php
class Korisnik implements JsonSerializable
{
    private $korisnikID;
    private $imePrezime;
    private $username;
    private $password;
    private $rola;

    /**
     * Korisnik constructor.
     * @param $korisnikID
     * @param $imePrezime
     * @param $username
     * @param $password
     * @param $rola
     */
    public function __construct($korisnikID, $imePrezime, $username, $password, $rola)
    {
        $this->korisnikID = $korisnikID;
        $this->imePrezime = $imePrezime;
        $this->username = $username;
        $this->password = $password;
        $this->rola = $rola;
    }

    /**
     * @return mixed
     */
    public function getKorisnikID()
    {
        return $this->korisnikID;
    }

    /**
     * @param mixed $korisnikID
     */
    public function setKorisnikID($korisnikID)
    {
        $this->korisnikID = $korisnikID;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRola()
    {
        return $this->rola;
    }

    /**
     * @param mixed $rola
     */
    public function setRola($rola)
    {
        $this->rola = $rola;
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