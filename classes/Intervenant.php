<?php

// Defines the Intervenant class representing an individual intervenant
class Intervenant {
    // Private properties to encapsulate the attributes of an intervenant
    private $id;           // Unique identifier for the intervenant
    private $nom;          // Last name of the intervenant
    private $prenom;       // First name of the intervenant
    private $affectation;  // Department or office of the intervenant
    private $urlWeb;       // URL to the personal or professional webpage of the intervenant

    // Constructor that initializes an Intervenant object with given or default values
    public function __construct($id = null, $nom = '', $prenom = '', $affectation = '', $urlWeb = '') {
        $this->id = $id;               // Set the id, null if not specified
        $this->nom = $nom;             // Set the last name, empty string if not specified
        $this->prenom = $prenom;       // Set the first name, empty string if not specified
        $this->affectation = $affectation; // Set the affectation, empty string if not specified
        $this->urlWeb = $urlWeb;       // Set the URL web, empty string if not specified
    }

    // Getter method for id, returns the id of the intervenant
    public function getId(): ?int {
        return $this->id;
    }

    // Setter method for id, accepts an integer id to set the intervenant's id
    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter method for nom, returns the last name of the intervenant
    public function getNom(): string {
        return $this->nom;
    }

    // Setter method for nom, accepts a string to set the last name of the intervenant
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    // Getter method for prenom, returns the first name of the intervenant
    public function getPrenom(): string {
        return $this->prenom;
    }

    // Setter method for prenom, accepts a string to set the first name of the intervenant
    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    // Getter method for affectation, returns the department or office of the intervenant
    public function getAffectation(): string {
        return $this->affectation;
    }

    // Setter method for affectation, accepts a string to set the department or office of the intervenant
    public function setAffectation(string $affectation): void {
        $this->affectation = $affectation;
    }

    // Getter method for urlWeb, returns the URL to the personal or professional webpage of the intervenant
    public function getUrlWeb(): string {
        return $this->urlWeb;
    }

    // Setter method for urlWeb, accepts a string to set the URL to the personal or professional webpage
    public function setUrlWeb(string $urlWeb): void {
        $this->urlWeb = $urlWeb;
    }
}
