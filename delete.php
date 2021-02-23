<?php
include 'db.php';
include 'functions.php';
$id = $_REQUEST['id'];
echo $id . "<br>";
deleteImages($pdo, $id);
$stmt = $pdo->prepare("DELETE FROM nekretnina WHERE id_nekretnina = $id");
if (!$stmt->execute()) {
    echo $stmt->errorCode();
} else {
    header("Location: index.php");
}
