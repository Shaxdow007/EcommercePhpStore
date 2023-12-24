<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter Produit || shadow007</title>
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <?php include 'include/nav.php';?>
  <?php include 'include/database.php';?>
  <div class="container py-5">
    <h4 class="mb-3 text-capitalize">Ajouter Produit</h4>
    <!-- php code start -->
    <?php
if (isset($_POST['ajouterProduit'])) {
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $discount = $_POST['discount'];
    $description = $_POST['description'];
    $categorie = $_POST['categorie'];
    // get image file:
    $file_name = 'produit.jpg';
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $file_name = uniqid() . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], 'produitImages/' . $file_name);
    }

    if (!empty($libelle) && !empty($prix) && !empty($description) && !empty($categorie)) {
        $sqlState = $conx->prepare('INSERT INTO produit(libelle,prix,discount,description,image,id_categorie) VALUES(?,?,?,?,?,?)');
        $sqlState->execute([$libelle, $prix, $discount, $description, $file_name, $categorie]);
        ?>
    <div class="alert alert-success" role="alert">
      your produit added!
    </div>
    <?php

    } else {
        ?>
    <div class="alert alert-danger" role="alert">
      you should enter libelle, prix and categorie!
    </div><?php
}
}

?>
    <!-- php code end -->
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="libelle" class="form-label">libelle</label>
        <input name="libelle" type="text" class="form-control" id="libelle">
      </div>
      <div class="mb-3">
        <label for="prix" class="form-label">prix</label>
        <input name="prix" type="number" class="form-control" id="prix" step="0.1" min="0">
      </div>
      <div class="mb-3">
        <label for="discount" class="form-label">discount</label>
        <input name="discount" type="number" class="form-control" id="discount" min="0" max="90">
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" name="description" id="description" style="height: 100px;"></textarea>
        <label for="description" class="form-label">Descrition</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="image">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="mb-3">
        <label for="categorie" class="form-label">categorie</label>
        <select name="categorie" type="text" class="form-control" id="categorie">
          <?php
$sqlState = $conx->prepare("SELECT * FROM categorie");
$sqlState->execute();
$categories = $sqlState->fetchAll(PDO::FETCH_ASSOC);
?>
          <?php foreach ($categories as $categorie) {?>
          <option value="<?=$categorie['id']?>"><?=$categorie['libelle']?></option>
          <?php }?>
        </select>
      </div>
      <button name="ajouterProduit" type="submit" class="btn btn-primary">Ajouter Produit</button>

    </form>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>