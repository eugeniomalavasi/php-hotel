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
?>

<?php
$user_parking = null;
if (isset($_GET["park"])) {

    $user_parking = $_GET["park"];
    if ($user_parking == 1) {
        $user_parking = true;
    } elseif ($user_parking == 3) {
        $user_parking = null;
    } else {
        $user_parking = false;
    }
    var_dump($user_parking);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Hotels PHP</title>
</head>

<body>
    <div class="container">
        <form action="index.php" method="get" class="mt-5">
            <label for="parking">Vuoi il parcheggio?</label>
            <select class="form-select" aria-label="Default select example" id="parking" name="park">
                <option value="1">Si</option>
                <option value="2">No</option>
                <option value="3">Indifferente</option>
            </select>
            <button type="submit" class="btn btn-primary">Primary</button>
        </form>
        <div class="row mt-5">
            <?php foreach ($hotels as $features) { ?>
                <?php if ($features['parking'] === $user_parking) { ?>

                    <div class="col-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $features['name']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Voto: <?php echo $features['vote']; ?></h6>
                                <p class="card-text"><?php echo $features['description']; ?></p>
                                <p>Hai il parcheggio:<?php echo $features['parking']; ?></p>
                                <p>Dista dal centro: <?php echo $features['distance_to_center']; ?> km</p>
                            </div>
                        </div>
                    </div>

                <?php } else if ($user_parking === null) { ?>
                    <div class="col-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $features['name']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Voto: <?php echo $features['vote']; ?></h6>
                                <p class="card-text"><?php echo $features['description']; ?></p>
                                <p>Hai il parcheggio:<?php echo $features['parking']; ?></p>
                                <p>Dista dal centro: <?php echo $features['distance_to_center']; ?> km</p>
                            </div>
                        </div>
                    </div>
                    <?php }?>

            <?php } ?>
        </div>
    </div>
    </div>
</body>

</html>