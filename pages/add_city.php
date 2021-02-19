<?php

include '../db.php';

$city = $_POST["city"];
$stmt = $pdo->prepare("INSERT INTO grad (grad) VALUES (:gr)");
$stmt->bindParam(':gr', $city, PDO::PARAM_STR);
if (!$stmt->execute()) {
    echo $stmt->errorCode();
} else {
    echo "Novi grad dodat!";
}
