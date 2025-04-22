<?php 
require_once "Client.php";require_once "Chambre.php";
class Reservation{

    private Client $_client;
    private Chambre $_chambre;
    private DateTime $_date_debut;
    private DateTime $_date_fin;

    public function __construct(Client $client, Chambre $chambre, DateTime $date_debut, DateTime $date_fin){
        $this->_client = $client;
        $this->_chambre = $chambre;
        $this->_date_debut = $date_debut;
        $this->_date_fin = $date_fin;
        $client->addReservation($this);
        $chambre->addReservation($this);
    }

    public function getClient(): Client {
        return $this->_client;
    }
    public function getChambre(): Chambre {
        return $this->_chambre;
    }
    public function getDateDebut(): DateTime {
        return $this->_date_debut;
    }
    public function getDateFin(): DateTime {
        return $this->_date_fin;
    }

    public function setClient(Client $client): void {
        $this->_client = $client;
    }
    public function setChambre(Chambre $chambre): void {
        $this->_chambre = $chambre;
    }
    public function setDateDebut(DateTime $date): void {
        $this->_date_debut = $date;
    }
    public function setDateFin(DateTime $date): void {
        $this->_date_fin = $date;
    }
}

?>