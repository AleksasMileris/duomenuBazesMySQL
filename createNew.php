

<?php
require_once 'db.php';

if(isset($_POST['saved'])){

    $result = $db->prepare("INSERT INTO employees (`name`, `surname`, `gender`, `phone`, `birthday`, `education`, `salary`) VALUES (?, ?, ?, ?, ?, ?, ?)"  );
    $result->execute([$_POST['name'],$_POST['surname'],$_POST['gender'],$_POST['phone'],$_POST['birthday'],$_POST['education'],$_POST['salary']]);
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
                <h2>Naujas darbuotojas</h2>
            </div>
        </div>
        <div class="card-body bg-dark  bg-opacity-75 ">
            <form method="post" action="createNew.php">
                <label class="mt-3">Vardas</label>
                <input type="text" class="form-control mt-1" name="name" value="" >

                <label class="mt-3">Pavarde</label>
                <input type="text" class="form-control mt-1" name="surname" value="" >

                <label class="mt-3">Lytis</label>
                <select name="gender" class="mt-1 form-select w-50">
                    <option value="male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label class="mt-3">Tel Nr.</label>
                <input type="text" class="form-control mt-1" name="phone" value="" >

                <label class="mt-3">Gimimo data</label>
                <input type="text" class="form-control mt-1" name="birthday" value="" >

                <label class="mt-3">Išsilavinimas</label>
                <textarea class="form-control mt-1" name="education"></textarea>

                <label class="mt-3">Alga Centais</label>
                <input type="text" class="form-control mt-1" name="salary" value="" >
                <button class="btn btn-info mt-3 float-end"  name="saved" value="1">Išsaugoti</button>
            </form>
        </div>

    </div>



</div>
