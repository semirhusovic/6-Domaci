<?php
include 'db.php';
include 'functions.php';
$id = $_REQUEST['id'];

// echo $id . "<br>";

$stmt = $pdo->prepare("SELECT * FROM nekretnina WHERE id_nekretnina = $id");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($result['cijena']);
echo     "<div class='container'><table class='table table-responsive-lg'>
<th>Cijena</th>
<th>Povrsina</th>
<th>Status</th>
<th>Opis</th>
<th>Godina Izgradnje</th>
<th>Datum prodaje</th>
<th>Grad</th>
<th>Tip nekretnine</th>
<th>Tip oglasa</th>
";
$curr_city = $result['id_grad'];
$curr_type = $result['id_tip_nekretnine'];
$curr_ad = $result['id_tip_oglasa'];
$status = $result['stats'] == 0 ? "Na prodaju" : "Prodato";
echo "
    <tr>
        <td>" . $result['cijena'] . "€</td>
        <td>" . $result['povrsina'] . "m²</td>
        <td>" . $status . "</td>
        <td>" . $result['opis'] . "</td>
        <td>" . $result['godina_izgradnje'] . "</td>
        <td>" . $result['datum_prodaje'] . "</td>
        <td>" . getByID($pdo, "grad", "grad", "id_grad", $curr_city) . "</td>
        <td>" . getByID($pdo, "tip_nekretnine", "tip_nekretnine", "id_tip_nekretnine", $curr_type) . "</td>
        <td>" . getByID($pdo, "tip_oglasa", "tip_oglasa", "id_tip_oglasa", $curr_ad) . "</td>
    </tr>
    </div>";

//     <?php
//     $images = getAllImages($pdo, $result['id_nekretnina']);
//     foreach ($images as $image) {
//         echo "<div class='carousel-item active'>
// <img class='d-block w-100' src='pages/$image' alt='First slide'>
// </div>";
//     }
//     >


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single view page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>

<body>
    <!-- Swiper -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper-container {
            width: 80%;
            height: 50%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>


    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            $images = getAllImages($pdo, $result['id_nekretnina']);
            // echo "<pre>";
            // var_dump($images);
            // echo "</pre>";
            foreach ($images as $key => $image) {
                echo "<div class='swiper-slide'><img class='d-block w-100' src='pages/" . $image['slika'] . "' alt='slika'></div>";
            }
            ?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>

</html>