<?php
$title = 'Postni ko\'rish';
require 'includes/header.php';
require 'database.php';

$id  = $_GET['id'];

$statement = $conn->prepare("SELECT * FROM prices WHERE id = ? ");
$statement->execute([$id]);
$prices = $statement -> fetch();


?>

<div class="container">
    <h1 class="text-body-emphasis"><?= $prices['nomi'] ?> </h1>
    <p class="fs-5 col-md-8"><?= $prices['xaqida'] ?></p>
    <p class="fs-5 col-md-8"><?= $prices['made_in'] ?></p>
    <p class="fs-5 col-md-8"><?= $prices['made_at'] ?></p>

    <div class="mb-5">
        <a href="/" class="btn btn-primary btn-lg px-4">Go to Home</a>
    </div>

     <hr class="col-3 col-md-2 mb-5"> 

</div>


<?php require 'includes/footer.php' ?>;