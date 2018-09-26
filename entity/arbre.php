<?php namespace entity;

class Arbre
{
     private $libellefrancais;
     private $objectid;
     private $idemplacement;
     private $dateplantation;
     private $circonferenceencm;
     private $hauteurenm;
     private $espece;
     private $adresse;
     private $geo_point_2d;
     private $arrondissement;
     private $pepiniere;
     private $stadedeveloppement;
     private $remarquable;
     private $idbase;
     private $genre;
     private $domanialite;
     private $typeemplacement;

    /**
     * Get the value of Libellefrancais
     *
     * @return mixed
     */
    public function getLibellefrancais()
    {
        return $this->libellefrancais;
    }

    /**
     * Set the value of Libellefrancais
     *
     * @param mixed libellefrancais
     *
     * @return self
     */
    public function setLibellefrancais($libellefrancais)
    {
        $this->libellefrancais = $libellefrancais;

        return $this;
    }

    /**
     * Get the value of Objectid
     *
     * @return mixed
     */
    public function getObjectid()
    {
        return $this->objectid;
    }

    /**
     * Set the value of Objectid
     *
     * @param mixed objectid
     *
     * @return self
     */
    public function setObjectid($objectid)
    {
        $this->objectid = $objectid;

        return $this;
    }

    /**
     * Get the value of Idemplacement
     *
     * @return mixed
     */
    public function getIdemplacement()
    {
        return $this->idemplacement;
    }

    /**
     * Set the value of Idemplacement
     *
     * @param mixed idemplacement
     *
     * @return self
     */
    public function setIdemplacement($idemplacement)
    {
        $this->idemplacement = $idemplacement;

        return $this;
    }

    /**
     * Get the value of Dateplantation
     *
     * @return mixed
     */
    public function getDateplantation()
    {
        return $this->dateplantation;
    }

    /**
     * Set the value of Dateplantation
     *
     * @param mixed dateplantation
     *
     * @return self
     */
    public function setDateplantation($dateplantation)
    {
        $this->dateplantation = $dateplantation;

        return $this;
    }

    /**
     * Get the value of Espece
     *
     * @return mixed
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * Set the value of Espece
     *
     * @param mixed espece
     *
     * @return self
     */
    public function setEspece($espece)
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get the value of Adresse
     *
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of Adresse
     *
     * @param mixed adresse
     *
     * @return self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of Remarquable
     *
     * @return mixed
     */
    public function getRemarquable()
    {
        return $this->remarquable;
    }

    /**
     * Set the value of Remarquable
     *
     * @param mixed remarquable
     *
     * @return self
     */
    public function setRemarquable($remarquable)
    {
        $this->remarquable = $remarquable;

        return $this;
    }

}

?>
