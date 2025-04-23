<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôtel</title>
<!--     <link rel="stylesheet" href="style.css"> -->
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.23.6/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.6/dist/js/uikit-icons.min.js"></script>
</head>
<body class="uk-background-muted">
    <?php require_once "Hotel.php"; require_once "Chambre.php"; require_once "Client.php"; require_once "Reservation.php"; ?>
    <?php 
    $clients = [
        new Client("Dupont", "Jean"),
        new Client("Martin", "Claire"),
        new Client("Durand", "Paul"),
        new Client("Lemoine", "Sophie"),
        new Client("Petit", "Lucie"),
    ];
    
    // Création des hôtels
    $hotels = [
        new Hotel(rand(1,200) . " rue Paris", "Hôtel Parisien", "Paris"),
        new Hotel(rand(1,200) . " rue Lyon", "Hôtel Lyonnais", "Lyon"),
        new Hotel(rand(1,200) . " avenue Bordeaux", "Hôtel Bordelais", "Bordeaux"),
        new Hotel(rand(1,200) . " boulevard Nice", "Hôtel Niçois", "Nice"),
    ];
    
    // Création des chambres
    foreach ($hotels as $hotel) {
        for ($i = 1; $i <= 10; $i++) {
            new Chambre(rand(80, 600), $hotel, rand(0, 1) === 1, rand(1, 7), rand(80, 200));
        }
    }
    function randomDate($start_date, $end_date)
    {
        // Convert to timetamps 
        $min = strtotime($start_date);
        $max = strtotime($end_date);
    
        // Generate random number using above bounds
        $val = rand($min, $max);
    
        // Convert back to desired date format
        return date('Y-m-d H:i:s', $val);
    }
    // Création des réservations (sauf pour le dernier hôtel)
    for ($h = 0; $h < 3; $h++) {
        $chambres = $hotels[$h]->getChambreList();
        foreach (array_slice($chambres, 0, rand(1, 10)) as $chambre) {
            new Reservation(
                $clients[array_rand($clients)],
                $chambre,
                new DateTime(rand(2015, 2023) . '-01-01'),
                new DateTime(rand(2015, 2023) . '-01-01')
            );
        }
    }
    

    
    
    ?>
    <div class="uk-flex uk-flex-around uk-flex-wrap uk-animation-fade">
        <?php     
        foreach($hotels as $hotel){
            echo $hotel;
        }
        ?>
    </div>
    <div class="uk-flex uk-flex-row uk-flex-around uk-flex-wrap uk-animation-fade">
        <?php     
        foreach($hotels as $hotel){
            $hotel->affReservation();
        }
        ?>
    </div>
    <div class="uk-flex uk-flex-row uk-flex-around uk-flex-wrap uk-animation-fade">
        <?php     
        foreach($clients as $client){
            $client->affReservation();
        }
        ?>
    </div>
        <div class="uk-flex uk-flex-row uk-flex-around uk-flex-wrap uk-animation-fade uk-text-justify">
        <?php     
        foreach($hotels as $hotel){
            $hotel->affStatChambre();
        }
        ?>
    </div>
</body>
</html>