<?php 
require_once "Reservation.php";
class Client{

    private string $_nom;
    private string $_prenom;
    private array $_reservations;

    public function __construct(string $nom, string $prenom){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_reservations = [];
    }

    public function addReservation(Reservation $reservation){
        $this->_reservations[] = $reservation;
    }
    public function affReservation(): void{
        $str = "<h2>Réservation de l'hôtel " . $this->_prenom . " " . $this->_nom . "</h2><br>";
        $nb = 0;
        foreach($this->_reservations as $reservation){
            $nb++;
        }
        if($nb > 0){
            $str .= "<div>" . $nb . " Réservation</div><br><div>";
        }else{
            $str .= "Aucune réservation !";
        }
        $tt = 0;
        foreach($this->_reservations as $reservation){
            $tt += $reservation->getChambre()->getPrix();
            $bal = true;
            if($reservation->getChambre()->getWifi()){
                $bal = true;
            }else{
                $bal = false;
            }
            $str .= "<b>Hotel : " . $reservation->getChambre()->getHotel()->getName() . " ***** " . $reservation->getChambre()->getHotel()->getVille() . "</b> / Chambre : " . $reservation->getChambre()->getNumChambre() . " (" . $reservation->getChambre()->getNbLit() . " lits - " . $reservation->getChambre()->getPrix() . " € - Wifi : " . $bal . ") du " . $reservation->getDateDebut()->format('Y-m-d H:i:s') . " au " . $reservation->getDateFin()->format('Y-m-d H:i:s') . ".<br>";   
        }
        if($tt > 0){
            $str .= "<div>Total: " . $tt . " €</div><br><div>";
        }else{
            $str .= "";
        }
        echo $str . "<br>";
    }

    public function getNom(): string {
        return $this->_nom;
    }
    public function getPrenom(): string {
        return $this->_prenom;
    }
    public function getReservation(): array {
        return $this->_reservations;
    }
    
    public function setNom(string $nom): void {
        $this->_nom = $nom;
    }
    public function setPrenom(string $prenom): void {
        $this->_prenom = $prenom;
    }
    public function setReservation(array $reservation): void {
        $this->_reservations = $reservation;
    }
}

?>