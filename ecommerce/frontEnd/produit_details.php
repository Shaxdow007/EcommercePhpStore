    <!-- php code start -->
    <?php
require_once '../include/database.php';
$id = $_GET['id'];
$sqlState = $conx->prepare('SELECT * FROM produit WHERE id=?');
$sqlState->execute([$id]);
$produit = $sqlState->fetch(PDO::FETCH_ASSOC);
?>
    <!-- php code end -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?=$produit['libelle']?> Produit|| shadow007</title>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- font awsome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
      <?php include_once '../include/navbar.php'?>
      <div class="container py-5">
        <h4 class="mb-5 text-capitalize"> <?=$produit['libelle']?>
          produit :</h4>
        <div class="row">
          <div class="col-md-6">
            <img class="img img-fluid object-fit-cover border rounded" src="../produitImages/<?=$produit['image']?>"
              alt="<?=$produit['libelle']?>">
          </div>
          <div class="col-md-6">
            <h1 class="display-1 fw-bold text-capitalize my-3"><?=$produit['libelle']?></h1>
            <?php if (!empty($produit['discount'])) {
    ?>
            <p><span class="badge text-bg-success">-<?=$produit['discount']?>%</span></p>
            <?php
}
?>
            <hr>
            <p class="fw-light text-capitalize">description:</p>
            <p class="fw-normal lh-base text-capitalize"><?=$produit['description']?></p>
            <hr>
            <?php
$discount = $produit['discount'];
$prix = $produit['prix'];
if (!empty($discount)) {
    $total = $prix - (($prix * $discount) / 100);
    ?>
            <div>
              <p class="fs-5 fw-medium text-capitalize">old price: <strike>
                  <?=$prix?>MAD</strike> </p>
            </div>
            <div>
              <p class="fs-5 fw-medium text-capitalize">final price: <?=$total?>MAD</p>
            </div>
            <?php
} else {
    $total = $prix;
    ?>
            <div>
              <p class="fs-5 fw-medium text-capitalize">price: <?=$total?>MAD</p>
            </div>
            <?php

}
?>
            <a class="btn btn-primary text-capitalize" href="#">buy now</a>
          </div>
        </div>
        <script src="../js/bootstrap.min.js"></script>
    </body>

    </html>