<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôtel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
                new DateTime("2025-05-10"),
                new DateTime("2025-05-10")
            );
        }
    }
    
    foreach($hotels as $hotel){
        echo $hotel;
    }
    foreach($hotels as $hotel){
        $hotel->affReservation();
    }
    foreach($clients as $client){
        $client->affReservation();
    }
    foreach($hotels as $hotel){
        $hotel->affStatChambre();
    }
    
    
    ?>
</body>
</html>