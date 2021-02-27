<?php

include '../db.php';
$id = intval($_REQUEST['id']);
var_dump($id);
$grad = $_POST['city'];
var_dump($grad);
$sql = "UPDATE grad
SET grad= '$grad'
WHERE id_grad = $id ";
$stmt = $pdo->prepare($sql);
if (!$stmt->execute()) {
    var_dump($stmt->errorInfo());
} else {
    header("Location: ../new_city.php");
}
