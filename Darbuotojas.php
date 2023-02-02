<?php
require_once 'db.php';
$id=(int)$_GET['id'];
$result = $db->prepare("SELECT * FROM employees WHERE id=?" );
$result->execute([$id]);

$duomenys = $result->fetch(PDO::FETCH_ASSOC);


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


    <div class="card col-md-8 mt-5">
        <div class="card-header bg-dark text-light">
            <div class="card-title">
                <h2>Darbuotojas(-ja): <?= $duomenys['name']?></h2>
            </div>
        </div>
        <div class="card-body bg-dark  bg-opacity-75 ">
            <table class="table table-hover text-light ">
                <thead >
                <tr>
                    <th>ID</th>
                    <th>Vardas</th>
                    <th>Pavarde</th>
                    <th>Lytis</th>
                    <th>Tel Nr.</th>
                    <th>Gimimo Data</th>
                    <th>Išsilavinimas</th>
                    <th>Atlyginimas</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?= $duomenys['id']?></td>
                        <td><?= $duomenys['name']?></td>
                        <td><?= $duomenys['surname']?></td>
                        <td><?= $duomenys['gender']?></td>
                        <td><?= $duomenys['phone']?></td>
                        <td><?= $duomenys['birthday']?></td>
                        <td><?= $duomenys['education']?></td>
                        <td><?= ($duomenys['salary']/100).' EUR'?></td>

                    </tr>


                </tbody>
            </table>
        </div>
    </div>


    <div class="card mt-5">
        <div class="card-header bg-dark text-light">
            <div class="card-title">
                <h2>Mokesčiai</h2>
            </div>
        </div>
        <div class="card-body bg-dark  bg-opacity-75 ">
                <table class="table table-hover text-light ">
                    <tbody>
                    <tr>
                        <td>Atlyginimas ant popieriaus :</td>
                        <td><?= ($duomenys['salary']/100).' EUR'?></td>
                    </tr>
                    <tr>
                        <td>NPD</td>
                        <td><?= (($duomenys['salary']/100) < 1926)?'272.2 EUR':'284.44 EUR' ?></td>
                    </tr>
                    <tr>
                        <td>Pajamu mokestis 20 %</td>
                        <td><?= (($duomenys['salary']/100 - 272)*0.20)." EUR" ?></td>
                    </tr>
                    <tr>
                        <td>Sodra Sveikatos Draudimas 6,98 %</td>
                        <td><?= round(($duomenys['salary']/100 - 272)*0.068 ,1)." EUR" ?></td>
                    </tr>
                    <tr>
                        <td>Sodra Pensiju ir soc. draudimas 12,52 %</td>
                        <td><?= (($duomenys['salary']/100 - 272)*0.125)." EUR" ?></td>
                    </tr>
                    <tr>
                        <td>Išmokamas atlyginimas "į rankas"</td>
                        <td><?= round(($duomenys['salary']/100)-(($duomenys['salary']/100 - 272)*0.125)-(($duomenys['salary']/100 - 272)*0.20)-(($duomenys['salary']/100 - 272)*0.068) ,2)." EUR" ?></td>
                    </tr>
                    <tr>
                        <th>Darbo Vietos Kaina</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Sodros įmoka (VSD) 1.77%</td>
                        <td>
                            <?= round((($duomenys['salary']/100 - 272)*0.017),2)." EUR" ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Sodros „grindys“ 21.27%</td>
                        <td><?= round((($duomenys['salary']/100 - 272)*0.212),2)." EUR" ?></td>
                    </tr>

                    </tbody>
                </table>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
