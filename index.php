<?php
$title = 'Bosh sahifa';
require 'includes/header.php';
require 'database.php';

$statement = $conn->prepare("SELECT * FROM prices");
$statement->execute();
$prices = $statement->fetchAll();

//var_dump($prices[0])

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {

    //var_dump($_POST);

    $prices_id = $_POST['prices_id'];
    $statement = $conn->prepare("DELETE FROM prices WHERE id = ?");
    $statement->execute([$prices_id]);

    $_SESSION['success'] = 'Post muvaffaqiyatli o\'chirildi';
    header("Location:index.php");

    exit;

}




?>



<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album example</h1>
                <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="post-create.php" class="btn btn-primary my-2">Post yaratish</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">


            <?php if (isset($_SESSION['success'])) : ?>

                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success'] ?>
                    <?php unset($_SESSION['success']) ?>
                </div>

            <?php endif; ?>

            <!-- <?php if (isset($_SESSION['success'])) : ?>

                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success'] ?>
                    <?php unset($_SESSION['success']) ?>
                </div>

            <?php endif; ?> -->

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach ($prices as $prices) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="post.php?id=<?= $prices['id'] ?>">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title><?= $prices['nomi'] ?></title>
                                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $prices['nomi'] ?></text>
                                </svg>
                            </a>
                            <div class="card-body">
                                <a href="post.php?id=<?= $prices['id'] ?>">
                                    <h4><?= $prices['nomi'] ?></h4>
                                </a>
                                <p class="card-text"><?= $prices['xaqida'] ?></p>
                                <h5><?= $prices['made_in'] ?></h5>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <form method="POST" action="" onSubmit="return confirm('rostdan o\'chsinmi')">
                                            <input type="hidden" name="prices_id" value="<?= $prices['id'] ?>">
                                            <input type="hidden" name="delete">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                        </form>
                                        <a href="/post-edit.php?id=<?= $prices['id'] ?>" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                    <small class="text-body-secondary"><?= $prices['made_at'] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>
    </div>

</main>




<?php require 'includes/footer.php' ?>;