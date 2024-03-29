<?php

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];
$parkingFilter = $_GET["parking"];
$voteFilter = $_GET["vote"];


$filteredHotel = [];

if($parkingFilter == "on" && $voteFilter >= 0){
    foreach($hotels as $hotel){
        if($hotel["parking"] == true && $hotel["vote"] >= intval($voteFilter)){
            $filteredHotel[] = $hotel;
        }
    }
}
else if($parkingFilter == "on"){
    foreach($hotels as $hotel){
        if($hotel["parking"] == true){
            $filteredHotel[] = $hotel;
        }
    }
    } 
 else if($voteFilter){
    foreach($hotels as $hotel){
        var_dump(intval($hotel["vote"],$voteFilter));
        if($hotel["vote"] >= intval($voteFilter) && !in_array($hotel,$filteredHotel)){
            $filteredHotel[] = $hotel;
        }
    }
}
else {
    $filteredHotel = $hotels;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="GET">
        <div class="container p-5">
            <input type="checkbox" id="parking" name="parking">
            <label for="parking"> Need parking?</label>

            <input type="number" min="1" max="5" id="vote" placeholder="stars" name="vote">
    <button type="submit" class="btn btn-primary">Search</button>
        </div>
     </form>
        <table class="container table table-secondary">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance To Center</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    foreach ($filteredHotel as $hotel) {
                        echo "<tr>";
                        foreach ($hotel as $feature => $value) {
                           echo "<td>" . $value . "</td>";
                        }
                        echo "</tr>";
                    };
                 
                     
                      


                    ?> 
                </tr>
            </tbody>
        </table>
</body>

</html>