<?php

include '../db.php';
$id = intval($_REQUEST['id']);
$tipNk = $_POST['tipNk'];
$sql = "UPDATE tip_nekretnine
SET tip_nekretnine= '$tipNk'
WHERE id_tip_nekretnine = $id ";
$stmt = $pdo->prepare($sql);
if (!$stmt->execute()) {
    var_dump($stmt->errorInfo());
} else {
    header("Location: ../new_type.php");
}
