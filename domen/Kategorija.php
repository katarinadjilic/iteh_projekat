<?php
class Kategorija implements JsonSerializable
{
    private $kategorijaID;
    private $nazivKategorije;
    private $opisKategorije;

    /**
     * Kategorija constructor.
     * @param $kategorijaID
     * @param $nazivKategorije
     * @param $opisKategorije
     */
    public function __construct($kategorijaID, $nazivKategorije, $opisKategorije)
    {
        $this->kategorijaID = $kategorijaID;
        $this->nazivKategorije = $nazivKategorije;
        $this->opisKategorije = $opisKategorije;
    }

    /**
     * @return mixed
     */
    public function getKategorijaID()
    {
        return $this->kategorijaID;
    }

    /**
     * @param mixed $kategorijaID
     */
    public function setKategorijaID($kategorijaID)
    {
        $this->kategorijaID = $kategorijaID;
    }

    /**
     * @return mixed
     */
    public function getNazivKategorije()
    {
        return $this->nazivKategorije;
    }

    /**
     * @param mixed $nazivKategorije
     */
    public function setNazivKategorije($nazivKategorije)
    {
        $this->nazivKategorije = $nazivKategorije;
    }

    /**
     * @return mixed
     */
    public function getOpisKategorije()
    {
        return $this->opisKategorije;
    }

    /**
     * @param mixed $opisKategorije
     */
    public function setOpisKategorije($opisKategorije)
    {
        $this->opisKategorije = $opisKategorije;
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