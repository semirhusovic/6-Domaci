<?php

include '../db.php';

$type = $_POST["tip"];
$stmt = $pdo->prepare("INSERT INTO tip_nekretnine (tip_nekretnine) VALUES (:tip)");
$stmt->bindParam(':tip', $type, PDO::PARAM_STR);
if (!$stmt->execute()) {
    echo $stmt->errorCode();
} else {
    header("Location: ../new_type.php");
}
