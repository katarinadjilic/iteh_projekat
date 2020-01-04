<?php
class Kategorija
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


}