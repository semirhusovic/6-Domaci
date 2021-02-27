<?php
include './db.php';
include './functions.php';
$results = getAllData($pdo, 'grad');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <title>Document</title>
    <form action="./pages/add_city.php" method="POST">

        <input type="text" name="city" placeholder="Unesite grad">
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
            <td>" . $row['id_grad'] . "</td>
            <td>" . $row['grad'] . "</td>
            <td><a href='pages/cityedit.php?id=" . $row['id_grad'] . "'>Edit</a></td>
            <td><a href='pages/citydelete.php?id=" . $row['id_grad'] . "'>Delete</a></td>
        </tr>";
        ?>
    </table>
</head>

<body>

</body>

</html>