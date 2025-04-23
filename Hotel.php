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
        return  "<div class=\"uk-card uk-card-hover  uk-card-body uk-card-secondary uk-margin-left uk-margin-top uk-border-rounded\"><h2 class=\"uk-card-title uk-text-center uk-text-bold\"> <p>" . $this->_name . " " . $this->_ville . "</h2><div class=\"uk-card-body\"><p><span uk-icon=\"home\"></span>  " . $this->_adr . "</p>" . "<p><span uk-icon=\"chevron-right\"></span> Nombre de chambres : <span class=\"uk-badge\">" . count($this->_chambre_list) . "</span></p>" . "<p><span uk-icon=\"chevron-right\"></span>  Nombre de chambres réservées : <span class=\"uk-badge\">" . $ch_occ . "</span></p>" . "<p><span uk-icon=\"chevron-right\"></span>  Nombre de chambres dispo : <span class=\"uk-badge\">" . $ch_lib . "</span></p><br></div></div>";
    }

    /**
     * Ajoute une chambre à la liste de chambres de l'hôtel.
     *
     * @param Chambre $chbr La chambre à ajouter
     * @return void
     */
    public function ajouterChambre(Chambre $chbr): void{
        $this->_chambre_list[] = $chbr;
    }
    /**
     * Affiche les réservations de l'hôtel dans une carte UIkit stylisée.
     * Montre le nombre total de réservations et le détail de chaque client réservé.
     * Si aucune réservation n'existe, affiche un message d'absence.
     *
     * @return void
     */
    public function affReservation(): void{
        $str = "<div class=\"uk-card uk-card-hover  uk-card-body uk-card-secondary uk-margin-left uk-margin-top uk-border-rounded uk-width-1-3@l\"><h2 class=\"uk-card-title uk-text-center uk-text-bold\">Réservation de l'hôtel " . $this->_name . " ***** " . $this->_ville . "</h2><br>";
        $nb_reserv = 0;
        foreach($this->_chambre_list as $chambre){
            if(!($chambre->getReserve() === [])){
                foreach($chambre->getReserve() as $reserve){
                    $nb_reserv += 1;
                }
            }
        }
        if($nb_reserv > 0){
            $str .= "<div><span uk-icon=\"info\"></span> " . $nb_reserv . " Réservation</div><br>";
        }else{
            $str .= "<span uk-icon=\"close-circle\"></span> Aucune réservation !";
        }
        $str .= "<p class=\"uk-pading-auto uk-margin-auto\">";
        foreach($this->_chambre_list as $chambre){
            if(!($chambre->getReserve() === [])){
                foreach($chambre->getReserve() as $reserve){
                    $client = $reserve->getClient();
                    $str .= "<span uk-icon=\"chevron-double-right\"></span> <span uk-icon=\"user\"></span> " . $client->getPrenom() . " ". $client->getNom() . " <span uk-icon=\"bell\"></span> Chambre " . $chambre->getNumChambre() . " <span uk-icon=\"calendar\"></span> du " . $reserve->getDateDebut()->format('Y-m-d') . " au " . $reserve->getDateFin()->format('Y-m-d') . ".<br>";
                }
            }
        }
        echo $str . "</p></div><br>";
    }
    /**
     * Affiche l'état des chambres de l'hôtel dans un tableau UIkit.
     * Chaque ligne indique : numéro de chambre, prix, présence du WiFi, et état de réservation.
     *
     * @return void
     */
    public function affStatChambre(): void{
        $str = "<div class=\"uk-card uk-card-hover uk-card-body uk-card-secondary uk-margin-left uk-margin-top uk-border-rounded uk-width-1-1@l\"><h2 class=\"uk-card-title uk-text-center uk-text-bold\">Status des chambres de " . $this->_name . " ***** " . $this->_ville . "</h2><br><table class=\"uk-table uk-table-divider uk-table-striped uk-table-hover uk-table-large uk-table-justify uk-table-middle\"><thead>
        <tr>
            <th>Chambre</th>
            <th>Prix (€)</th>
            <th>WiFi</th>
            <th>État</th>
        </tr>
    </thead>
    <tbody>";
        foreach($this->_chambre_list as $chambre){
            $str .= "<tr><td>Chambre" . $chambre->getNumChambre() . "</td><td>" . $chambre->getPrix() . " (€)</td>";
            $wifi = "Non";
            if($chambre->getWifi()){
                $wifi = "Oui";
            }
            $reservation = "Réservée";
            if($chambre->getReserve() === []){
                $reservation = "Disponble";
            }
            $str .= "<td>" . $wifi . "</td>" . "<td>" . $reservation . "</td></tr>";
        }
        echo $str . "</tbody></table>" . "</div><br>";
    }

    //Getter
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

    //Setter
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


