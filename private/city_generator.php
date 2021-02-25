<?php
include '../db.php';
$cities = array('Andrijevica', 'Bar', 'Berane', 'Bijelo Polje', 'Budva', 'Cetinje', 'Danilovgrad', 'Herceg Novi', 'Kolasin', 'Kotor', 'Mojkoviac', 'Niksic', 'Plav', 'Pljevlja', 'Pluzine', 'Podgorica', 'Rozaje', 'Savnik', 'Tivat', 'Ulcinj', 'Zabljak');
$types = array('Stan', 'Kuca', 'Garaza', 'Poslovni prostor');
$ads = array('Prodaja', 'Iznajmljivanje', 'Kompenzacija');

$stmt = $pdo->prepare("INSERT INTO grad(grad) VALUES (:city)");
foreach ($cities as $city) {
    $stmt->bindParam(':city', $city);
    $stmt->execute();
}
$stmt2 = $pdo->prepare("INSERT INTO tip_nekretnine(tip_nekretnine) VALUES (:tip)");
foreach ($types as $type) {
    $stmt2->bindParam(':tip', $type);
    $stmt2->execute();
}
$stmt3 = $pdo->prepare("INSERT INTO tip_oglasa(tip_oglasa) VALUES (:ad)");
foreach ($ads as $ad) {
    $stmt3->bindParam(':tip', $ad);
    $stmt3->execute();
}
// Popunjavanje pocetnih podataka u DB