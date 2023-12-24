    <!-- php code start -->
    <?php
require_once '../include/database.php';
$id = $_GET['id'];
$sqlState = $conx->prepare('SELECT * FROM categorie WHERE id=?');
$sqlState->execute([$id]);
$categories = $sqlState->fetch(PDO::FETCH_ASSOC);
// get the product on the categorie
$sqlState = $conx->prepare('SELECT * FROM produit WHERE id_categorie=?');
$sqlState->execute([$id]);
$produits = $sqlState->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- php code end -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?=$categories['libelle']?> Categorie || shadow007</title>
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
        <h4 class="mb-5 text-capitalize"><i class="<?=$categories['icon']?>"></i> <?=$categories['libelle']?>
          categories :</h4>
        <!-- card start -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php foreach ($produits as $produit) {?>
          <div class="col">
            <div class="card">
              <img src="../produitImages/<?=$produit['image']?>" class="card-img-top object-fit-cover border rounded"
                width="100%" height="250" alt="produit">
              <a class="d-inline-block m-3 w-50 btn btn-primary stretched-link text-capitalize text-start"
                href="produit_details.php?id=<?=$produit['id']?>">produit
                details</a>
              <div class="card-body">
                <h5 class="card-title text-capitalize"><?=$produit['libelle']?></h5>
                <p class="card-text fw-normal lh-base text-capitalize"><?=$produit['description']?></p>
                <p class="card-text"><small class="text-muted text-capitalize">ajouter le: <?=date_format(date_create($produit['date_creation']), "Y-m-d")
    ?></small> </p>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
        <?php
if (empty($produit)) {
    ?>
        <div class="alert alert-info text-capilize" role="alert">
          pas de produit pour l'instant
        </div>
        <?php
}
?>
        <!-- card end -->
        <script src="../js/bootstrap.min.js"></script>
    </body>

    </html>