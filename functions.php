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

function deleteImages($pdo, $id_nekretnine)
{
    $stmt = $pdo->prepare("SELECT * FROM fotografije WHERE id_nekretnina = $id_nekretnine ");
    if (!$stmt->execute()) {
        echo $stmt->errorCode();
    } else {
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            unlink("pages/" . $result['slika']); //* Brise se 1 po 1 slika iz foldera
        }
    }
    $stmt2 = $pdo->prepare("DELETE FROM fotografije WHERE id_nekretnina = $id_nekretnine ");
    if (!$stmt2->execute()) {
        echo $stmt2->errorCode(); //* Vracanje greske pri brisanju iz databaze
    }
}

function deleteByID($pdo, $tableName, $fieldName, $id)
{
    $stmt = $pdo->prepare("DELETE FROM $tableName WHERE $fieldName = $id");
    if (!$stmt->execute()) {
        echo $stmt->errorCode();
    }
}

function getAllImages($pdo, $id)
{
    $stmt = $pdo->prepare("SELECT slika FROM fotografije WHERE id_nekretnina=$id");
    if (!$stmt->execute()) {
        echo $stmt->errorCode();
    } else {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
