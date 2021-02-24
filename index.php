<?php
include './db.php';
include './functions.php';

$stmt = $pdo->prepare("SELECT * FROM fotografije RIGHT JOIN nekretnina ON nekretnina.id_nekretnina = fotografije.id_nekretnina GROUP BY fotografije.id_nekretnina");
$stmt->execute();
echo     "<div class='container'> <div class='card-deck'>";
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $status = $result['stats'] == 0 ? "Na prodaju" : "Prodato";
    echo "<div class='card'>
             <img class='card-img-top' src='pages/" . $result['slika'] . "' alt='Card image cap'>
             <div class='card-body'>
             <a href='single.php?id=" . $result['id_nekretnina'] . "'><h5 class='card-title' id='naziv'>" . $result['naziv'] . "</h5></a>
                 <p class='card-text opis'><b>Opis</b>: " . $result['opis'] . "</p>
                 <p class='card-text opis'><b>Grad</b>: " . getByID($pdo, "grad", "grad", "id_grad", $result['id_grad']) .  "</p>
                 <p class='card-text opis'><b>Tip nekretnine</b>: " . getByID($pdo, "tip_nekretnine", "tip_nekretnine", "id_tip_nekretnine", $result['id_tip_nekretnine']) .  "</p>
                 <p class='card-text opis'><b>Tip oglasa</b>: " . getByID($pdo, "tip_oglasa", "tip_oglasa", "id_tip_oglasa", $result['id_tip_oglasa']) .  "</p>
                 <p class='card-text'>Cijena: <span class='badge badge-info'>" . $result['cijena'] . "€</span> </p>
                 <p class='card-text'>Povrsina: <span class='badge badge-primary'>" . $result['povrsina'] . "m²</span> </p>
                 <p class='card-text'><small class='text-muted'>Datum izgradnje: " . $result['godina_izgradnje'] . "</small></p>
                 <p class='card-text text-center'>
                    <div class='row'>
                        <a class='btn btn-primary col-md-6' href='edit.php?id=" . $result['id_nekretnina'] . "'><i class='fas fa-edit'></i> </a>
                        <a class='btn btn-danger col-md-6' href='delete.php?id=" . $result['id_nekretnina'] . "'><i class='fas fa-trash-alt'></i></a>
                    </div>
                </p>
             </div>
    </div>";
}
echo "    </div></div>"
?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <div class="container text-center mb-3">
        <a class="btn btn-primary" href="./new_city.php">Dodaj grad</a>
        <a class="btn btn-primary" href="./new_nekretnina.php">Dodaj nekretninu</a>
        <a class="btn btn-primary" href="./new_type.php">Dodaj tip nekretnine</a>
    </div>

</body>

</html>