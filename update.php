<?php
require_once 'db.php';
$id=(int)$_GET['id'];

$result = $db->prepare("SELECT * FROM employees WHERE id=?" );
$result->execute([$id]);
$duomenys = $result->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['saved'])){
    $id=(int)$_GET['id'];
    $result = $db->prepare("UPDATE `employees` SET name=? ,surname=?,gender=?,phone=?,birthday=?,education=?,salary=? WHERE id=?"  );
    $result->execute([$_POST['name'],$_POST['surname'],$_POST['gender'],$_POST['phone'],$_POST['birthday'],$_POST['education'],$_POST['salary'], $id]);
    header("location: index.php");
    die();
};



?>


<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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


    <div class="card col-md-8 mt-5">
        <div class="card-header bg-dark text-light">
            <div class="card-title">
                <h2>Darbuotojas(-ja): <?= $duomenys['name']?></h2>
            </div>
        </div>
        <div class="card-body bg-dark  bg-opacity-75 ">
            <form method="post" action="update.php?id=<?= $id ?>">
            <label class="mt-3">Vardas</label>
            <input class="form-control mt-1" name="name" value="<?= $duomenys['name']?>" >

            <label class="mt-3">Pavarde</label>
            <input class="form-control mt-1" name="surname" value="<?= $duomenys['surname']?>" >

            <label class="mt-3">Lytis</label>
            <select name="gender" class="mt-1 form-select w-50">
                <option value=<?= ($duomenys['gender'] == 'Male')?'Male':'Female'?>><?= ($duomenys['gender'] == 'Male')?'Male':'Female'?></option>
                <option value="<?= ($duomenys['gender'] == 'Female')?'Male':'Female'?>"><?= ($duomenys['gender'] == 'Female')?'Male':'Female'?></option>
            </select>

            <label class="mt-3">Tel Nr.</label>
            <input class="form-control mt-1" name="phone" value="<?= $duomenys['phone']?>" >

            <label class="mt-3">Gimimo data</label>
            <input class="form-control mt-1" name="birthday" value="<?= $duomenys['birthday']?>" >

            <label class="mt-3">Išsilavinimas</label>
            <textarea class="form-control mt-1" name="education"> <?= $duomenys['education']?></textarea>

            <label class="mt-3">Alga</label>
            <input class="form-control mt-1" name="salary" value="<?= ($duomenys['salary'])." EUR"?>" >
                <button class="btn btn-info mt-3 float-end"  name="saved">Išsaugoti</button>
            </form>
        </div>

    </div>



</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>