<?php

include '../db.php';
$id = $_REQUEST['id'];
$naziv = $_POST["naziv"];
$cijena = $_POST["cijena"];
$povrsina = $_POST["povrsina"];
$status = isset($_POST['status']) ? 1 : 0;
$opis = $_POST["opis"];
$datumIzgradnje = $_POST["datumIzgradnje"];
$datumProdaje = $_POST["datumProdaje"];
$idGrad = $_POST["idGrad"];
$idTipNekretnine = $_POST["idTipNekretnine"];
$idTipOglasa = $_POST["idTipOglasa"];

$stmt = $pdo->prepare("UPDATE `nekretnina`
SET `naziv` = :nz , `cijena`= :ci , `povrsina` = :po , `stats`= :st ,`opis`= :op,`godina_izgradnje` = :datI, `datum_prodaje`= :datP ,`id_grad`= :idG ,`id_tip_nekretnine`= :idTN ,`id_tip_oglasa`= :idTO WHERE `id_nekretnina`= :idNK");
$stmt->bindParam(':nz', $naziv);
$stmt->bindParam(':ci', $cijena);
$stmt->bindParam(':po', $povrsina);
$stmt->bindParam(':st', $status);
$stmt->bindParam(':op', $opis);
$stmt->bindParam(':datI', $datumIzgradnje);
$stmt->bindParam(':datP', $datumProdaje);
$stmt->bindParam(':idG', $idGrad);
$stmt->bindParam(':idTN', $idTipNekretnine);
$stmt->bindParam(':idTO', $idTipOglasa);
$stmt->bindParam(':idNK', $id);
if (!$stmt->execute()) {
    echo $stmt->errorCode();
} else {
    // echo "Edit uspjesan!";
    $last_id = $pdo->lastInsertId();
    header("Location: ../index.php");
}


// * UPLOAD SLIKA NEKRETNINE
// if (isset($_FILES['photos'])) {
//     $stmt2  = $pdo->prepare("INSERT INTO fotografije(`slika`,`id_nekretnina`) VALUES(:slika, $last_id)");
//     $errors = array();
//     foreach ($_FILES['photos']['tmp_name'] as $key => $error) {
//         if ($error != UPLOAD_ERR_OK) {
//             $errors[] = $_FILES['photos']['name'][$key] . ' was not uploaded.';
//             continue;
//         }
//         $tmp_name = $_FILES["photos"]["tmp_name"][$key];
//         $file_name = $key . $_FILES['photos']['name'][$key];
//         try {
//             $uploadDestination = "uploads";
//             $path = $uploadDestination . '/' . uniqid() . ".png";
//             if (is_dir($uploadDestination) == false) {
//                 echo "Napravljen novi folder";
//                 mkdir($uploadDestination, 0700); //* Pravljenje novog foldera ukoliko on ne postoji
//             }
//             if (is_file($uploadDestination . '/' . $file_name) == false) {
//                 move_uploaded_file($tmp_name, $path);
//                 echo "prebacena slika";
//             }
//             echo $path . "<br>";
//             $stmt2->bindParam(':slika', $path, PDO::PARAM_STR);
//             if (!$stmt2->execute()) {
//                 var_dump($stmt2->errorInfo());
//             } else {
//                 echo "Slika uspjesno sacuvana!";
//             }
//         } catch (PDOException $e) {
//             $errors[] = $file_name . 'nije sacuvana u bazu podataka.';
//             echo $e->getMessage();
//         }
//     }
//     if (empty($error)) {
//         echo "Uspjesno";
//     }
// }
// * KRAJ UPLOADA SLIKA SLIKE
