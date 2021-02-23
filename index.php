<?php
include './db.php';
include './functions.php';

$stmt = $pdo->prepare("SELECT * FROM fotografije RIGHT JOIN nekretnina ON nekretnina.id_nekretnina = fotografije.id_nekretnina GROUP BY fotografije.id_nekretnina");
$stmt->execute();
echo     "<div class='container'> <div class='card-deck'>";
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $curr_city = $result['id_grad'];
    $curr_type = $result['id_tip_nekretnine'];
    $curr_ad = $result['id_tip_oglasa'];
    $status = $result['stats'] == 0 ? "Na prodaju" : "Prodato";
    echo "<div class='card'>
             <img class='card-img-top' src='pages/" . $result['slika'] . "' alt='Card image cap'>
             <div class='card-body'>
                 <h5 class='card-title'>" . $result['naziv'] . "</h5>
                 <p class='card-text opis'>" . $result['opis'] . "</p>
                 <p class='card-text'><small class='text-muted'>Datum izgradnje: " . $result['godina_izgradnje'] . "</small></p>
                 <p class='card-text'>Cijena: <span class='badge badge-info'>" . $result['cijena'] . "€</span> </p>
                 <p class='card-text'>Povrsina: <span class='badge badge-primary'>" . $result['povrsina'] . "m²</span> </p>
             </div>
         </div>";
}
echo "    </div></div>"
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

        .fa-trash-alt {
            color: red;
        }

        .opis {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .card-deck {
            margin: 0 -15px;
            justify-content: space-between;
        }

        .card-deck .card {
            margin: 0 0 1rem;
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            .card-deck .card {
                -ms-flex: 0 0 48.7%;
                flex: 0 0 48.7%;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .card-deck .card {
                -ms-flex: 0 0 32%;
                flex: 0 0 32%;
            }
        }

        @media (min-width: 992px) {
            .card-deck .card {
                -ms-flex: 0 0 24%;
                flex: 0 0 24%;
            }
        }
    </style>

    <div class="container text-center mb-3">
        <a class="btn btn-primary" href="./new_city.php">Dodaj grad</a>
        <a class="btn btn-primary" href="./new_nekretnina.php">Dodaj nekretninu</a>
        <a class="btn btn-primary" href="./new_type.php">Dodaj tip nekretnine</a>
    </div>

</body>


</html>