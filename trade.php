<?php
require_once 'db.php';

if(isset($_GET['delete'])){
    $result = $db->prepare("DELETE FROM `employees` WHERE id=? "  );
    $result->execute([$_GET['delete']]);
}

$stm = $db->prepare('SELECT * FROM employees WHERE worker_id=?');
$stm->execute([$_GET['id']]);
$duomenys = $stm->fetchAll(PDO::FETCH_ASSOC);


$dataBase = $db->query('SELECT * FROM positions ');
$positions = $dataBase->fetchAll(PDO::FETCH_ASSOC);



$stm= $db->prepare("SELECT name,id FROM `positions`");
$stm->execute([]);
$trade=$stm->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>


<div class="container font-monospace">

    <?php include_once 'trades_by_cat.php'?>

    <table class="table table-dark table-striped table-hover table-bordered border-primary table-sm mt-5">
        <a class="btn-success btn float-end mt-5 mb-2" href="createNew.php">Prideti Nauja Darbuotoja</a>
        <thead>
        <tr >
            <th>Vardas</th>
            <th>Pavarde</th>
            <th>Tel nr.</th>
            <th>Išsilavinimas</th>

            <th>Atlyginimas</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($duomenys as $data){  ?>
            <tr>
                <td><?= $data['name'] ?></td>
                <td><?= $data['surname'] ?></td>
                <td><?= $data['phone'] ?></td>
                <td><?= $data['education'] ?></td>

                <td><?= ($data['salary']/100)." EUR" ?></td>
                <td><a class="btn btn-warning" href="Darbuotojas.php?id=<?= $data['id'] ?>">Apie</a></td>
                <td><a class="btn btn-info" href="update.php?id=<?= $data['id'] ?>">Redaguoti</a></td>
                <td><a class="btn btn-danger" href="index.php?delete=<?= $data['id'] ?>">Ištrinti</a></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>