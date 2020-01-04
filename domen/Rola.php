<?php
class Rola
{
    private $rolaID;
    private $nazivRole;

    /**
     * Rola constructor.
     * @param $rolaID
     * @param $nazivRole
     */
    public function __construct($rolaID, $nazivRole)
    {
        $this->rolaID = $rolaID;
        $this->nazivRole = $nazivRole;
    }

    /**
     * @return mixed
     */
    public function getRolaID()
    {
        return $this->rolaID;
    }

    /**
     * @param mixed $rolaID
     */
    public function setRolaID($rolaID)
    {
        $this->rolaID = $rolaID;
    }

    /**
     * @return mixed
     */
    public function getNazivRole()
    {
        return $this->nazivRole;
    }

    /**
     * @param mixed $nazivRole
     */
    public function setNazivRole($nazivRole)
    {
        $this->nazivRole = $nazivRole;
    }


}