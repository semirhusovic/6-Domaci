<?php
include '../db.php';
$cities = array('Andrijevica', 'Bar', 'Berane', 'Bijelo Polje', 'Budva', 'Cetinje', 'Danilovgrad', 'Herceg Novi', 'Kolasin', 'Kotor', 'Mojkoviac', 'Niksic', 'Plav', 'Pljevlja', 'Pluzine', 'Podgorica', 'Rozaje', 'Savnik', 'Tivat', 'Ulcinj', 'Zabljak');


$stmt = $pdo->prepare("INSERT INTO grad(grad) VALUES (:city)");
foreach ($cities as $city) {
    $stmt->bindParam(':city', $city);
    $stmt->execute();
}
