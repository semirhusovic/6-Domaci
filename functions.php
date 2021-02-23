<?php
include 'db.php';

function getByID($pdo, $table, $wfield, $uslov, $value)
{
    $stmt = $pdo->prepare("SELECT $wfield FROM $table WHERE $uslov = $value ");
    $stmt->execute();
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return $result["$wfield"];
    }
}

getByID($pdo, "grad", "grad", "id_grad", 1);
getByID($pdo, "tip_nekretnine", "tip_nekretnine", "id_tip_nekretnine", 1);
