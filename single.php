<?php
include 'db.php';
include 'functions.php';
$id = $_REQUEST['id'];

$stmt = $pdo->prepare("SELECT * FROM nekretnina WHERE id_nekretnina = $id");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$status = $result['stats'] == 0 ? "Na prodaju" : "Prodato";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single view page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/style-slider.css">
</head>

<body>
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
    <div class='container'>
        <table class='table table-responsive-lg'>
            <tr>
                <th>Cijena</th>
                <td><?= $result['cijena'] . '€' ?></td>
            </tr>
            <tr>
                <th>Povrsina</th>
                <td><?= $result['povrsina'] . 'm²' ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?= $status ?></td>
            </tr>
            <tr>
                <th>Opis</th>
                <td><?= $result['opis'] ?></td>
            </tr>
            <tr>
                <th>Godina izgradnje</th>
                <td><?= $result['godina_izgradnje'] ?></td>
            </tr>
            <tr>
                <th>Datum prodaje</th>
                <td><?= $result['datum_prodaje'] ?></td>
            </tr>
            <tr>
                <th>Grad</th>
                <td><?= getByID($pdo, "grad", "grad", "id_grad", $result['id_grad']) ?></td>
            </tr>
            <tr>
                <th>Tip nekretnine</th>
                <td><?= getByID($pdo, "tip_nekretnine", "tip_nekretnine", "id_tip_nekretnine", $result['id_tip_nekretnine']) ?></td>
            </tr>
            <tr>
                <th>Tip oglasa</th>
                <td><?= getByID($pdo, "tip_oglasa", "tip_oglasa", "id_tip_oglasa", $result['id_tip_oglasa']) ?></td>
            </tr>
        </table>
    </div>
</body>

</html>