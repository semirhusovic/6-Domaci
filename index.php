<?php
include './db.php';

$stmt = $pdo->prepare("SELECT * FROM fotografije RIGHT JOIN nekretnina ON nekretnina.id_nekretnina = fotografije.id_nekretnina GROUP BY fotografije.id_nekretnina");
$stmt->execute();
echo     "<div class='container'><table class='table table-responsive-lg'>
<th>ID Nekretnine</th>
<th>Cijena</th>
<th>Povrsina</th>
<th>Status</th>
<th>Opis</th>
<th>Godina Izgradnje</th>
<th>Datum prodaje</th>
<th>ID Grad</th>
<th>ID Tip nekretnine</th>
<th>ID Tip oglasa</th>
<th>Slika</th>
<th>Akcije</th>
";
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "
    <tr>
        <td>" . $result['id_nekretnina'] . "</td>
        <td>" . $result['cijena'] . "€</td>
        <td>" . $result['povrsina'] . "</td>
        <td>" . $result['stats'] . "</td>
        <td>" . $result['opis'] . "</td>
        <td>" . $result['godina_izgradnje'] . "</td>
        <td>" . $result['datum_prodaje'] . "</td>
        <td>" . $result['id_grad'] . "</td>
        <td>" . $result['id_tip_nekretnine'] . "</td>
        <td>" . $result['id_tip_oglasa'] . "</td>
        <td><img alt='slika' src='pages/" . $result['slika'] . "'></td>
        <td><i class='fas fa-edit'></i> <i class='fas fa-trash-alt'></i></td>
    </tr>
    </div>";
}
?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


</head>

<body>
    <style>
        body {
            padding-top: 50px;
        }

        img {
            height: 200px;
            width: 200px;
        }

        .fa-trash-alt {
            color: red;
        }
    </style>

    <div class="container text-center mb-3">
        <a class="btn btn-primary" href="./new_city.php">Dodaj grad</a>
        <a class="btn btn-primary" href="./new_nekretnina.php">Dodaj nekretninu</a>
        <a class="btn btn-primary" href="./new_type.php">Dodaj tip nekretnine</a>
    </div>
</body>

<!-- <a href="./show_apartments.php">Sve nekretnine</a> -->

</html>