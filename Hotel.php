<?php 
require_once "Chambre.php";
class Hotel{

    private string $_ville;
    private string $_name;
    private string $_adr;
    private array $_chambre_list;

    public function __construct(string $adr, string $name, string $ville){
        $this->_ville = $ville;
        $this->_name = $name;
        $this->_adr = $adr;
    }

    public function ajouterChambre(Chambre $chbr): void{
        $this->_chambre_list[] = $chbr;
    }
    public function __toString() : string{
        $ch_occ = 0;
        $ch_lib = 0;
        foreach($this->_chambre_list as $chambre){
            if($chambre->getReserve() === []){
                $ch_lib++;
            }else{
                $ch_occ++;
            }
        } 
        return  "<h2> " . $this->_name . " " . $this->_ville . "</h2><div><p>" . $this->_adr . "</p>" . "<p> Nombre de chambres : " . count($this->_chambre_list) . "</p>" . "<p> Nombre de chambres réservées : " . $ch_occ . "</p>" . "<p> Nombre de chambres dispo : " . $ch_lib . "</p><br></div>";
    }
    public function affReservation(): void{
        $str = "<h2>Réservation de l'hôtel " . $this->_name . " ***** " . $this->_ville . "</h2><br>";
        $nb_reserv = 0;
        foreach($this->_chambre_list as $chambre){
            if(!($chambre->getReserve() === [])){
                foreach($chambre->getReserve() as $reserve){
                    $nb_reserv += 1;
                }
            }
        }
        if($nb_reserv > 0){
            $str .= "<div>" . $nb_reserv . " Réservation</div><br><div>";
        }else{
            $str .= "Aucune réservation !";
        }
        foreach($this->_chambre_list as $chambre){
            if(!($chambre->getReserve() === [])){
                foreach($chambre->getReserve() as $reserve){
                    $client = $reserve->getClient();
                    $str .= $client->getPrenom() . " ". $client->getNom() . " - Chambre " . $chambre->getNumChambre() . " - du " . $reserve->getDateDebut()->format('Y-m-d H:i:s') . " au " . $reserve->getDateFin()->format('Y-m-d H:i:s') . ".<br>";
                }
            }
        }
        echo $str . "<br>";
    }


    public function getVille(): string {
        return $this->_ville;
    }
    public function getName(): string {
        return $this->_name;
    }
    public function getAdr(): string {
        return $this->_adr;
    }
    public function getChambreList(): array {
        return $this->_chambre_list;
    }

    public function setVille(string $ville): void {
        $this->_ville = $ville;
    }
    public function setName(string $name): void {
        $this->_name = $name;
    }
    public function setAdr(string $adr): void {
        $this->_adr = $adr;
    }
    public function setChambreList(array $list): void {
        $this->_chambre_list = $list;
    }
}

?>