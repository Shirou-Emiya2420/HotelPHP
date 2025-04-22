<?php 
require_once "Reservation.php";
class Client{

    private string $_nom;
    private string $_prenom;
    private array $_reservation;

    public function __construct(string $nom, string $prenom){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_reservation = [];
    }

    public function addReservation(Reservation $reservation){
        $this->_reservation[] = $reservation;
    }


    public function getNom(): string {
        return $this->_nom;
    }
    public function getPrenom(): string {
        return $this->_prenom;
    }
    public function getReservation(): array {
        return $this->_reservation;
    }
    
    public function setNom(string $nom): void {
        $this->_nom = $nom;
    }
    public function setPrenom(string $prenom): void {
        $this->_prenom = $prenom;
    }
    public function setReservation(array $reservation): void {
        $this->_reservation = $reservation;
    }
}

?>