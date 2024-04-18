<?php

// Class representing a seminar, typically an event involving a presentation or a discussion
class Seminaire {
    // Private properties encapsulating the seminar details
    private $id;               // Unique identifier for the seminar
    private $intervenantId;    // Identifier linking to the intervenant (presenter or speaker) 
    private $titre;            // Title of the seminar
    private $resume;           // Brief summary or abstract of the seminar content
    private $lieu;             // Venue or location of the seminar
    private $dateIntervention; // Scheduled date and time of the seminar
    private $dateMaj;          // Date of the last update to the seminar details

    // Constructor to initialize the seminar with provided or default values
    public function __construct($id = null, $intervenantId = null, $titre = '', $resume = '', $lieu = '', $dateIntervention = '', $dateMaj = '') {
        $this->id = $id;                         // Sets the seminar's ID
        $this->intervenantId = $intervenantId;   // Sets the linked intervenant's ID
        $this->titre = $titre;                   // Sets the title of the seminar
        $this->resume = $resume;                 // Sets the summary of the seminar
        $this->lieu = $lieu;                     // Sets the location of the seminar
        $this->dateIntervention = $dateIntervention; // Sets the date and time of the seminar
        $this->dateMaj = $dateMaj;               // Sets the last update date of the seminar information
    }

    // Getter method for seminar ID
    public function getId(): ?int {
        return $this->id;
    }

    // Setter method for seminar ID
    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter method for the ID of the linked intervenant
    public function getIntervenantId(): ?int {
        return $this->intervenantId;
    }

    // Setter method for the intervenant ID
    public function setIntervenantId(int $intervenantId): void {
        $this->intervenantId = $intervenantId;
    }

    // Getter method for the title of the seminar
    public function getTitre(): string {
        return $this->titre;
    }

    // Setter method for the title
    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    // Getter method for the summary of the seminar
    public function getResume(): string {
        return $this->resume;
    }

    // Setter method for the summary
    public function setResume(string $resume): void {
        $this->resume = $resume;
    }

    // Getter method for the location of the seminar
    public function getLieu(): string {
        return $this->lieu;
    }

    // Setter method for the location
    public function setLieu(string $lieu): void {
        $this->lieu = $lieu;
    }

    // Getter method for the date and time of the seminar
    public function getDateIntervention(): string {
        return $this->dateIntervention;
    }

    // Setter method for the date and time of the seminar
    public function setDateIntervention(string $dateIntervention): void {
        $this->dateIntervention = $dateIntervention;
    }

    // Getter method for the last update date
    public function getDateMaj(): string {
        return $this->dateMaj;
    }

    // Setter method for the last update date
    public function setDateMaj(string $dateMaj): void {
        $this->dateMaj = $dateMaj;
    }
}
