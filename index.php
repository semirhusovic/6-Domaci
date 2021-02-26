<?php
include './db.php';
include './functions.php';
$cOd = isset($_POST['cOd']) ? $_POST['cOd'] : 0;
$cDo = isset($_POST["cDo"]) ? $_POST["cDo"] : 99999999;

$stmt = $pdo->prepare("SELECT * FROM fotografije RIGHT JOIN nekretnina ON nekretnina.id_nekretnina = fotografije.id_nekretnina GROUP BY fotografije.id_nekretnina");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <form class='col-8 offset-2 search-form' action='index.php' method='POST'>
        <div class='form-row'>
            <div class='col'>
                <input type='number' class='form-control' placeholder='Cijena od' name='cOd'>
            </div>
            <div class='col'>
                <input type='number' class='form-control' placeholder='Cijena do' name='cDo'>
            </div>
            <div class='col'>
                <input type='number' class='form-control' placeholder='Povrsina od' name='pOd'>
            </div>
            <div class='col'>
                <input type='number' class='form-control' placeholder='Povrsina do' name='pDo'>
            </div>
            <div class='col'>
                <select name='gradId' class="form-control">" .
                    <?php $gradovi = getAllData($pdo, 'grad');
                    foreach ($gradovi as $grad) {
                        echo "<option value='" . $grad['id_grad'] . "'>" . $grad['grad'] . "</option>";
                    } ?>
                </select>
            </div>
            <div class='col'>
                <select name='tipId' class="form-control">" .
                    <?php $tipovi_og = getAllData($pdo, 'tip_oglasa');
                    foreach ($tipovi_og as $tip_og) {
                        if ($result2['id_tip_oglasa'] == $tip_og['id_tip_oglasa']) {
                            echo "<option value='" . $tip_og['id_tip_oglasa'] . "'selected>" . $tip_og['tip_oglasa'] . "</option>";
                        } else {
                            echo "<option value='" . $tip_og['id_tip_oglasa'] . "'>" . $tip_og['tip_oglasa'] . "</option>";
                        }
                    } ?>
                </select>
            </div>
            <div class='col'>
                <button class='btn btn-primary' type='submit'>Pretrazi</button>
            </div>
        </div>
    </form>
    <div class="container text-center mb-3">
        <a class="btn btn-primary" href="./new_city.php">Dodaj grad</a>
        <a class="btn btn-primary" href="./new_nekretnina.php">Dodaj nekretninu</a>
        <a class="btn btn-primary" href="./new_type.php">Dodaj tip nekretnine</a>
    </div>

    <div class='container'>
        <div class='card-deck'>
            <?php
            foreach ($results as $result) {
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
            ?>
        </div>

</body>

</html>