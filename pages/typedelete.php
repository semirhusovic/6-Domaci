<?php
include '../db.php';
include '../functions.php';
$id = $_REQUEST['id'];
echo $id . "<br>";
$stmt = $pdo->prepare("DELETE FROM tip_nekretnine WHERE id_tip_nekretnine = $id");
if (!$stmt->execute()) {
    echo $stmt->errorCode();
} else {
    header("Location: ../new_type.php");
}
