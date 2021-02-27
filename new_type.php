<?php
include './db.php';
include './functions.php';
$results = getAllData($pdo, 'tip_nekretnine');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <form action="pages/add_nekretnina_type.php" method="POST">

        <input type="text" name="tip" placeholder="Unesite tip">
        <button type="submit">Submit</button>
    </form>
    <br>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Ime</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <?php
        foreach ($results as $row)
            echo "
        <tr>
            <td>" . $row['id_tip_nekretnine'] . "</td>
            <td>" . $row['tip_nekretnine'] . "</td>
            <td><a href='pages/typeedit.php?id=" . $row['id_tip_nekretnine'] . "'>Edit</a></td>
            <td><a href='pages/typedelete.php?id=" . $row['id_tip_nekretnine'] . "'>Delete</a></td>
        </tr>";
        ?>
    </table>
</body>

</html>