<?php

include '../db.php';

$cijena = $_POST["cijena"];
$povrsina = $_POST["povrsina"];
$status = $_POST["status"];
$opis = $_POST["opis"];
$datumIzgradnje = $_POST["datumIzgradnje"];
$datumProdaje = $_POST["datumProdaje"];
$idGrad = $_POST["idGrad"];
$idTipNekretnine = $_POST["idTipNekretnine"];
$idTipOglasa = $_POST["idTipOglasa"];
// var_dump($idGrad);

// echo '<pre>';
// var_dump($_FILES);
// echo '<pre>';

$stmt = $pdo->prepare("INSERT INTO `nekretnina`(`cijena`, `povrsina`, `stats`, `opis`, `godina_izgradnje`, `datum_prodaje`, `id_grad`, `id_tip_nekretnine`, `id_tip_oglasa`) VALUES (:ci,:po,:st,:op,:datI,:datP,:idG,:idTN,:idTO)");
$stmt->bindParam(':ci', $cijena, PDO::PARAM_STR);
$stmt->bindParam(':po', $povrsina, PDO::PARAM_STR);
$stmt->bindParam(':st', $status, PDO::PARAM_STR);
$stmt->bindParam(':op', $opis, PDO::PARAM_STR);
$stmt->bindParam(':datI', $datumIzgradnje, PDO::PARAM_STR);
$stmt->bindParam(':datP', $datumProdaje, PDO::PARAM_STR);
$stmt->bindParam(':idG', $idGrad, PDO::PARAM_INT);
$stmt->bindParam(':idTN', $idTipNekretnine, PDO::PARAM_INT);
$stmt->bindParam(':idTO', $idTipOglasa, PDO::PARAM_INT);
if (!$stmt->execute()) {
    echo $stmt->errorCode();
} else {
    echo "New entry added!";
    $last_id = $pdo->lastInsertId();
}


// * UPLOAD SLIKA NEKRETNINE
if (isset($_FILES['photos'])) {
    $stmt2  = $pdo->prepare("INSERT INTO fotografije(`slika`,`id_nekretnina`) VALUES(:slika, $last_id)");
    $errors = array();
    foreach ($_FILES['photos']['tmp_name'] as $key => $error) {
        if ($error != UPLOAD_ERR_OK) {
            $errors[] = $_FILES['photos']['name'][$key] . ' was not uploaded.';
            continue;
        }
        $tmp_name = $_FILES["photos"]["tmp_name"][$key];
        $file_name = $key . $_FILES['photos']['name'][$key];
        try {
            $uploadDestination = "uploads";
            $path = $uploadDestination . '/' . uniqid() . ".png";
            if (is_dir($uploadDestination) == false) {
                mkdir($uploadDestination, 0700); //* Pravljenje novog foldera ukoliko on ne postoji
            }
            if (is_file($uploadDestination . '/' . $file_name) == false) {
                move_uploaded_file($tmp_name, $path);
            }
            // echo $path . "<br>";
            $stmt2->bindParam(':slika', $path, PDO::PARAM_STR);
            if (!$stmt2->execute()) {
                var_dump($stmt2->errorInfo());
            } else {
                echo "Slika uspjesno sacuvana!";
            }
        } catch (PDOException $e) {
            $errors[] = $file_name . 'nije sacuvana u bazu podataka.';
            echo $e->getMessage();
        }
    }
    if (empty($error)) {
        echo "Uspjesno";
    }
}
// * KRAJ UPLOADA SLIKA SLIKE
