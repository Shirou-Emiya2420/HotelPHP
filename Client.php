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

    /**
     * Ajoute une réservation à la liste du client.
     *
     * @param Reservation $reservation La réservation à ajouter
     * @return void
     */
    public function addReservation(Reservation $reservation){
        $this->_reservations[] = $reservation;
    }
    /**
     * Affiche toutes les réservations d'un client dans une carte UIkit.
     * Pour chaque réservation, affiche l'hôtel, la chambre, les dates et le prix total.
     *
     * @return void
     */
    public function affReservation(): void{
        $str = "<div class=\"uk-card uk-card-hover  uk-card-body uk-card-secondary uk-margin-left uk-margin-top uk-border-rounded uk-width-1-4@l\"><h2 class=\"uk-card-title uk-text-center uk-text-bold\"><h2 class=\"uk-card-title uk-text-center uk-text-bold\">Réservation de l'hôtel " . $this->_prenom . " " . $this->_nom . "</h2><br>";
        $nb = 0;
        foreach($this->_reservations as $reservation){
            $nb++;
        } 
        if($nb > 0){
            $str .= "<div><span uk-icon=\"info\"></span> " . $nb . " Réservation</div><br><div>";
        }else{
            $str .= "<span uk-icon=\"close-circle\"></span> Aucune réservation !";
        }
        $tt = 0;
        $str .= "<div class\"uk-text-center\">";
        foreach($this->_reservations as $reservation){
            $tt += $reservation->getChambre()->getPrix();
            $bal = true;
            if($reservation->getChambre()->getWifi()){
                $bal = "Oui";
            }else{
                $bal = "Non";
            }
            $str .= "<span uk-icon=\"chevron-double-right\"></span> <span uk-icon=\"home\"></span> <b>Hotel : " . $reservation->getChambre()->getHotel()->getName() . " ***** " . $reservation->getChambre()->getHotel()->getVille() . "</b><br> <span uk-icon=\"bell\"></span> Chambre : " . $reservation->getChambre()->getNumChambre() . " (<span uk-icon=\"bookmark\"></span>" . $reservation->getChambre()->getNbLit() . " lits - " . $reservation->getChambre()->getPrix() . " € | <span uk-icon=\"rss\"></span> : " . $bal . ") <br> <span uk-icon=\"calendar\"></span> " . $reservation->getDateDebut()->format('Y-m-d') . " au " . $reservation->getDateFin()->format('Y-m-d') . ".<br>";   
        }
        $str .= "</div>";
        if($tt > 0){
            $str .= "<div class=\"uk-margin-top\"> <span uk-icon=\"check\"></span> Total: " . $tt . " €</div><br><div>";
        }else{
            $str .= "";
        }
        echo $str . "</div></div></div><br>";
    }

    //Getter
    public function getNom(): string {
        return $this->_nom;
    }
    public function getPrenom(): string {
        return $this->_prenom;
    }
    public function getReservation(): array {
        return $this->_reservations;
    }
    
    //Setter
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