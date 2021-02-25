<?php
include 'db.php';
include 'functions.php';
$id = $_REQUEST['id'];
$result2 = getByID2($pdo, 'nekretnina', '*', 'id_nekretnina', $id);
// echo "<pre>";
// var_dump($result['id_tip_nekretnine']);
// echo "</pre>";
// exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form class="col-8 offset-2" action='./pages/update_nekretnina.php?id=<?php echo "$id"; ?>' method="POST" enctype="multipart/form-data">

            <input class="form-control mb-2 mt-5" type="text" name="naziv" placeholder='Unesite naziv' value="<?= $result2['naziv'] ?>">
            <input class="form-control mb-2" type="text" name="cijena" placeholder="Unesite cijenu" value="<?= $result2['cijena'] ?>">
            <input class="form-control mb-2" type="text" name="povrsina" placeholder="Unesite povrsinu" value="<?= $result2['povrsina'] ?>">
            <div class="form-check form-control mb-2">
                <input class="form-check-input" type="checkbox" name="status" <?php if ($result2['stats']) {
                                                                                    echo "checked ";
                                                                                } ?>placeholder="Status"> <label class="form-check-label" for="status">Prodato?</label>
            </div>
            <textarea class="form-control mb-2" type="text" rows=5 name="opis" placeholder="Opis"><?= $result2['opis'] ?></textarea>
            <input class="form-control mb-2" type="date" name="datumIzgradnje" placeholder="Godina izgradnje" value="<?= $result2['godina_izgradnje'] ?>">
            <input class="form-control mb-2" type="date" name="datumProdaje" placeholder="Datum prodaje" value="<?= $result2['datum_prodaje'] ?>">

            <select class="form-control mb-2" name="idGrad">
                <option>Izaberite grad</option>
                <?php
                $gradovi = getAllData($pdo, 'grad');
                foreach ($gradovi as $grad) {
                    if ($result2['id_grad'] == $grad['id_grad']) {
                        echo "<option value='" . $grad['id_grad'] . "'selected>" . $grad['grad'] . "</option>";
                    } else {
                        echo "<option value='" . $grad['id_grad'] . "'>" . $grad['grad'] . "</option>";
                    }
                }
                ?>
            </select>
            <select class="form-control mb-2" name="idTipNekretnine">
                <option>Izaberite tip nekretnine</option>
                <?php
                $tipovi_nk = getAllData($pdo, 'tip_nekretnine');
                foreach ($tipovi_nk as $tip_nk) {
                    if ($result2['id_tip_nekretnine'] == $tip_nk['id_tip_nekretnine']) {
                        echo "<option value='" . $tip_nk['id_tip_nekretnine'] . "'selected>" . $tip_nk['tip_nekretnine'] . "</option>";
                    } else {
                        echo "<option value='" . $tip_nk['id_tip_nekretnine'] . "'>" . $tip_nk['tip_nekretnine'] . "</option>";
                    }
                }
                ?>
            </select>
            <select class="form-control mb-2" name="idTipOglasa">
                <option>Izaberite tip oglasa</option>
                <?php
                $tipovi_og = getAllData($pdo, 'tip_oglasa');
                foreach ($tipovi_og as $tip_og) {
                    if ($result2['id_tip_oglasa'] == $tip_og['id_tip_oglasa']) {
                        echo "<option value='" . $tip_og['id_tip_oglasa'] . "'selected>" . $tip_og['tip_oglasa'] . "</option>";
                    } else {
                        echo "<option value='" . $tip_og['id_tip_oglasa'] . "'>" . $tip_og['tip_oglasa'] . "</option>";
                    }
                }
                ?>
            </select>
            <!-- <input class="form-control mb-2" type="file" name="photos[]" multiple> -->
            <button class="form-control btn btn-primary" type="submit" value="UPLOAD">Submit</button>
        </form>
    </div>
</body>

</html>