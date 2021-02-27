<?php
include '../db.php';
include '../functions.php';
$id = $_REQUEST['id'];
echo $id . "<br>";
$stmt = $pdo->prepare("DELETE FROM grad WHERE id_grad = $id");
if (!$stmt->execute()) {
    echo $stmt->errorCode();
} else {
    header("Location: ../new_city.php");
}
