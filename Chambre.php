<?php 
require_once "Hotel.php";
require_once "Client.php";
require_once "Reservation.php";
class Chambre{

    private int $_prix;
    private Hotel $_hotel;
    private bool $_wifi;
    private int $_nb_lit;
    private int $_num_chambre;
    private array $_reserve;
    
    public function __construct(int $prix, Hotel $hotel, bool $wifi, int $nb_lit, int $num_chambre){
        $this->_prix = $prix;
        $this->_hotel = $hotel;
        $this->_wifi = $wifi;
        $this->_nb_lit = $nb_lit;
        $this->_num_chambre = $num_chambre;
        $this->_reserve = [];
        $hotel->ajouterChambre($this); 
    }

    /**
     * Ajoute une réservation à la liste du client.
     *
     * @param Reservation $reservation La réservation à ajouter
     * @return void
     */
    public function addReservation(Reservation $reservation){
        $this->_reserve[] = $reservation;
    }

    //Getter
    public function getPrix(): int {
        return $this->_prix;
    }
    public function getHotel(): Hotel {
        return $this->_hotel;
    }
    public function getWifi(): bool {
        return $this->_wifi;
    }
    public function getNbLit(): int {
        return $this->_nb_lit;
    }
    public function getReserve(): array {
        return $this->_reserve;
    }
    public function getNumChambre(): int {
        return $this->_num_chambre;
    } 

    //Setter
    public function setPrix(int $prix): void {
        $this->_prix = $prix;
    }
    public function setHotel(Hotel $hotel): void {
        $this->_hotel = $hotel;
    }
    public function setWifi(bool $wifi): void {
        $this->_wifi = $wifi;
    }
    public function setNbLit(int $nb): void {
        $this->_nb_lit = $nb;
    }
    public function setReserve(array $reserve): void {
        $this->_reserve = $reserve;
    }
}
?>