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
        <form action="./pages/add_nekretnina.php" method="POST" enctype="multipart/form-data">

            <input type="text" name="cijena" placeholder="Unesite cijenu">
            <input type="text" name="povrsina" placeholder="Unesite povrsinu">
            <input type="text" name="status" placeholder="Status">
            <input type="text" name="opis" placeholder="Opis">
            <input type="date" name="datumIzgradnje" placeholder="Godina izgradnje">
            <input type="date" name="datumProdaje" placeholder="Datum prodaje">

            <select name="idGrad">
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
            <select name="idTipNekretnine">
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
            <select name="idTipOglasa">
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
            <input type="file" name="photos[]" multiple>
            <button type="submit" value="UPLOAD">Submit</button>
        </form>
    </div>
</body>

</html>