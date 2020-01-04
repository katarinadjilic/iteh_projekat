<?php
class Rola implements JsonSerializable
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