<?php

//ENTITY ARBRE
class Arbre
{
    public function getLibellefrancais() { 
         return $this->libellefrancais 
    }
    public function setLibellefrancais($libellefrancais) { 
         $this->libellefrancais = $libellefrancais 
    }
    public $libellefrancais; //String

    public function getObjectid() { 
         return $this->objectid 
    }
    public function setObjectid($objectid) { 
         $this->objectid = $objectid 
    }
    public $objectid; //int

    public function getIdemplacement() { 
         return $this->idemplacement 
    }
    public function setIdemplacement($idemplacement) { 
         $this->idemplacement = $idemplacement 
    }
    public $idemplacement; //String

    public function getDateplantation() { 
         return $this->dateplantation 
    }
    public function setDateplantation($dateplantation) { 
         $this->dateplantation = $dateplantation 
    }
    public $dateplantation; //Date

    public function getCirconferenceencm() { 
         return $this->circonferenceencm 
    }
    public function setCirconferenceencm($circonferenceencm) { 
         $this->circonferenceencm = $circonferenceencm 
    }
    public $circonferenceencm; //int

    public function getHauteurenm() { 
         return $this->hauteurenm 
    }
    public function setHauteurenm($hauteurenm) { 
         $this->hauteurenm = $hauteurenm 
    }
    public $hauteurenm; //int

    public function getEspece() { 
         return $this->espece 
    }
    public function setEspece($espece) { 
         $this->espece = $espece 
    }
    public $espece; //String

    public function getAdresse() { 
         return $this->adresse 
    }
    public function setAdresse($adresse) { 
         $this->adresse = $adresse 
    }
    public $adresse; //String

    public function getGeo_point_2d() { 
         return $this->geo_point_2d 
    }
    public function setGeo_point_2d($geo_point_2d) { 
         $this->geo_point_2d = $geo_point_2d 
    }
    public $geo_point_2d; //array(double)

    public function getArrondissement() { 
         return $this->arrondissement 
    }
    public function setArrondissement($arrondissement) { 
         $this->arrondissement = $arrondissement 
    }
    public $arrondissement; //String

    public function getPepiniere() { 
         return $this->pepiniere 
    }
    public function setPepiniere($pepiniere) { 
         $this->pepiniere = $pepiniere 
    }
    public $pepiniere; //String

    public function getStadedeveloppement() { 
         return $this->stadedeveloppement 
    }
    public function setStadedeveloppement($stadedeveloppement) { 
         $this->stadedeveloppement = $stadedeveloppement 
    }
    public $stadedeveloppement; //String

    public function getRemarquable() { 
         return $this->remarquable 
    }
    public function setRemarquable($remarquable) { 
         $this->remarquable = $remarquable 
    }
    public $remarquable; //String

    public function getIdbase() { 
         return $this->idbase 
    }
    public function setIdbase($idbase) { 
         $this->idbase = $idbase 
    }
    public $idbase; //int

    public function getGenre() { 
         return $this->genre 
    }
    public function setGenre($genre) { 
         $this->genre = $genre 
    }
    public $genre; //String

    public function getDomanialite() { 
         return $this->domanialite 
    }
    public function setDomanialite($domanialite) { 
         $this->domanialite = $domanialite 
    }
    public $domanialite; //String

    public function getTypeemplacement() { 
         return $this->typeemplacement 
    }
    public function setTypeemplacement($typeemplacement) { 
         $this->typeemplacement = $typeemplacement 
    }
    public $typeemplacement; //String

}

class Arbre
{
    public function getArbres() { 
         return $this->arbres 
    }
    public function setArbres($arbres) { 
         $this->arbres = $arbres 
    }
    public $arbres; //array(Arbre)

}
