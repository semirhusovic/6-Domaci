<?php
include './db.php';
include './functions.php';
$query = "SELECT * FROM fotografije RIGHT JOIN nekretnina ON nekretnina.id_nekretnina = fotografije.id_nekretnina WHERE 1=1";
$dodatni_uslovi = "";
if ((isset($_POST['cOd'])) && $_POST['cOd'] != '') {
    $cOd = intval($_POST['cOd']);
    $dodatni_uslovi .= " AND nekretnina.cijena > $cOd ";
}
if ((isset($_POST['cDo'])) && $_POST['cDo'] != '') {
    $cDo = intval($_POST['cDo']);
    $dodatni_uslovi .= " AND nekretnina.cijena <= $cDo ";
}
if ((isset($_POST['pOd'])) && $_POST['pOd'] != '') {
    $pOd = intval($_POST['pOd']);
    $dodatni_uslovi .= " AND nekretnina.povrsina > $pOd ";
}
if ((isset($_POST['pDo'])) && $_POST['pDo'] != '') {
    $pDo = intval($_POST['pDo']);
    $dodatni_uslovi .= " AND nekretnina.povrsina < $pDo ";
}

if ((isset($_POST['gradId'])) && $_POST['gradId'] != '0') {
    $idGrad = intval($_POST['gradId']);
    $dodatni_uslovi .= " AND nekretnina.id_grad = $idGrad";
}

if ((isset($_POST['tipId'])) && $_POST['tipId'] != '0') {
    $idTip = intval($_POST['tipId']);
    $dodatni_uslovi .= " AND nekretnina.id_tip_oglasa = $idTip";
}
if ((isset($_POST['idNk'])) && $_POST['idNk'] != '0') {
    $idNk = intval($_POST['idNk']);
    $dodatni_uslovi .= " AND nekretnina.id_tip_nekretnine = $idNk";
}
$stmt = $pdo->prepare($query . $dodatni_uslovi . " GROUP BY fotografije.id_nekretnina");
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
                <input type='number' class='form-control mb-2' value="<?= $cOd ?>" placeholder='Cijena od' name='cOd'>
                <input type='number' class='form-control' value="<?= $cDo ?>" placeholder='Cijena do' name='cDo'>
            </div>
            <div class='col'>
                <input type='number' class='form-control mb-2' value="<?= $pOd ?>" placeholder='Povrsina od' name='pOd'>
                <input type='number' class='form-control' value="<?= $pDo ?>" placeholder='Povrsina do' name='pDo'>
            </div>
            <div class='col'>
                <select name='gradId' class="form-control">
                    <option value='0'>--Grad--</option>" .
                    <?php $gradovi = getAllData($pdo, 'grad');
                    foreach ($gradovi as $grad) {
                        if ($grad['id_grad'] == $idGrad) {
                            echo "<option selected value='" . $grad['id_grad'] . "'>" . $grad['grad'] . "</option>";
                        } else {
                            echo "<option value='" . $grad['id_grad'] . "'>" . $grad['grad'] . "</option>";
                        }
                    } ?>
                </select>
            </div>
            <div class='col'>
                <select name='tipId' class="form-control">"
                    <option value='0'>--Tip--</option> .
                    <?php $tipovi_og = getAllData($pdo, 'tip_oglasa');
                    foreach ($tipovi_og as $tip_og) {
                        if ($tip_og['id_tip_oglasa'] == $idTip) {
                            echo "<option selected value='" . $tip_og['id_tip_oglasa'] . "'>" . $tip_og['tip_oglasa'] . "</option>";
                        } else {
                            echo "<option value='" . $tip_og['id_tip_oglasa'] . "'>" . $tip_og['tip_oglasa'] . "</option>";
                        }
                    } ?>
                </select>
            </div>
            <div class='col'>
                <select name='idNk' class="form-control">"
                    <option value='0'>--Tip--</option> .
                    <?php $tipovi_nk = getAllData($pdo, 'tip_nekretnine');
                    foreach ($tipovi_nk as $tip_nk) {
                        if ($tip_nk['id_tip_nekretnine'] == $idNk) {
                            echo "<option selected value='" . $tip_nk['id_tip_nekretnine'] . "'>" . $tip_nk['tip_nekretnine'] . "</option>";
                        } else {
                            echo "<option value='" . $tip_nk['id_tip_nekretnine'] . "'>" . $tip_nk['tip_nekretnine'] . "</option>";
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