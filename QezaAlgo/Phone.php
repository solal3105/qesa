<?php

/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 26/05/2017
 * Time: 17:34
 */

/**
 * Class Phone
 */
class Phone{
    /**
     * @var String : marque du téléphone
     */
    private $marque;

    /**
     * @var String : modele du telephone
     */
    private $modele;

    /**
     * @var Int : notePerfs du téléphone
     */
    private $perfs;

    /**
     * @var Int : notePhoto du téléphone
     */
    private $photo;

    /**
     * @var Int : noteAutonomie du téléphone
     */
    private $autonomie;

    /**
     * @var Double : prix max du téléphone
     */
    private $prix;

    /**
     * @var Double : Points du téléphone par rapport aux utilisations de l'utilisateur
     */
    private $points;


    /**
     * Phone constructor.
     * @param $marque String
     * @param $modele String
     * @param $perfs Int
     * @param $photo Int
     * @param $autonomie Int
     * @param $points Double
     * @param $prix Int
     */
    function __construct($marque,$modele,$perfs,$photo,$autonomie,$points,$prix){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->perfs = $perfs;
        $this->photo = $photo;
        $this->autonomie = $autonomie;
        $this->points = $points;
        $this->prix = $prix;
    }

    /**
     * @return String
     */
    public function getMarque(){
        return $this->marque;
    }

    /**
     * @return String
     */
    public function getModele(){
        return $this->modele;
    }

    /**
     * @return float
     */
    public function  getPoints(){
        return $this->points;
    }

    /**
     * @return float
     */
    public function getPrix(){
        return $this->prix;
    }
}