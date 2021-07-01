<?php
class Personne
{

    //Declaration des variables
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $email;
    private $adresse;
    private $sexe;
    private $password;


    //Constructeur
    public function __construct($nom, $prenom, $dateNaissance, $adresse, $email, $sexe, $password)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->sexe = $sexe;
        $this->password = $password;
    }

    //Getters
    public function getNom()
    {
        return $this->nom;
    }
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getSexe()
    {
        return $this->sexe;
    }
    public function getPassword()
    {
        return $this->password;
    }

    //Setters
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setAdresse($adresse)
    {
        $this->email = $adresse;
    }
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
