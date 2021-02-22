<?php
include './db.php';
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
        <form class="col-8 offset-2" action="./pages/add_nekretnina.php" method="POST" enctype="multipart/form-data">

            <input class="form-control mb-2 mt-5" type="text" name="cijena" placeholder="Unesite cijenu">
            <input class="form-control mb-2" type="text" name="povrsina" placeholder="Unesite povrsinu">
            <input class="form-control mb-2" type="text" name="status" placeholder="Status">
            <input class="form-control mb-2" type="text" name="opis" placeholder="Opis">
            <input class="form-control mb-2" type="date" name="datumIzgradnje" placeholder="Godina izgradnje">
            <input class="form-control mb-2" type="date" name="datumProdaje" placeholder="Datum prodaje">

            <select class="form-control mb-2" name="idGrad">
                <option>Izaberite grad</option>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM grad");
                $stmt->execute();
                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id = $result['id_grad'];
                    echo "
                    <option value='$id'>" . $result['grad'] . "</option>";
                }
                ?>
            </select>
            <select class="form-control mb-2" name="idTipNekretnine">
                <option>Izaberite tip nekretnine</option>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM tip_nekretnine");
                $stmt->execute();
                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id = $result['id_tip_nekretnine'];
                    echo "
                    <option value='$id'>" . $result['tip_nekretnine'] . "</option>";
                }
                ?>
            </select>
            <select class="form-control mb-2" name="idTipOglasa">
                <option>Izaberite tip oglasa</option>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM tip_oglasa");
                $stmt->execute();
                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id = $result['id_tip_oglasa'];
                    echo "
                    <option value='$id'>" . $result['tip_oglasa'] . "</option>";
                }
                ?>
            </select>
            <input class="form-control mb-2" type="file" name="photos[]" multiple>
            <button class="form-control btn btn-primary" type="submit" value="UPLOAD">Submit</button>
        </form>
    </div>
</body>

</html>