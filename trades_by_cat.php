<?php


$stm= $db->prepare("SELECT name,id FROM `positions`");
$stm->execute([]);
$trade=$stm->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="card  mt-5">
    <div class="card-header bg-dark text-light text-center">
        <div class="card-title">
            <h2>Pareigos</h2>
        </div>
    </div>
    <div class="card-body bg-dark  bg-opacity-75 text-center">
        <?php foreach ($trade as $specialty){ ?>
            <a class="btn-outline-danger btn  mt-2 mb-2" href="trade.php?id=<?= $specialty['id'] ?>"><?= $specialty['name'] ?></a>

        <?php } ?>
        <a class="btn-outline-success btn float-end mt-2 mb-2" href="index.php">Visi Dardbuotojai</a>
    </div>
</div>

