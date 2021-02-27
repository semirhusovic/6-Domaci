<?php
include '../db.php';
include '../functions.php';
$id = $_REQUEST['id'];
$result = getByID2($pdo, 'grad', '*', 'id_grad', $id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="cityupdate.php?id=<?= $id ?>" method="POST">

            <input type="text" name="city" value="<?= $result['grad'] ?>" placeholder="Unesite grad">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>