<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>liste des produit || shadow007</title>
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <?php include 'include/nav.php';?>
  <?php include 'include/database.php';?>
  <div class="container py-5">
    <h4 class="mb-5 text-capitalize">modifier produit</h4>
    <!-- php code start -->
    <?php
// get the values from get method than display them in the inputs:
$id_produit = $_GET['id_produit'];
$sqlState = $conx->prepare("SELECT * FROM produit WHERE id=?");
$sqlState->execute([$id_produit]);
$data_produit = $sqlState->fetch(PDO::FETCH_ASSOC);
// modify :
if (isset($_POST['modifierProduit'])) {
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $discount = $_POST['discount'];
    $description = $_POST['description'];
    $categorie = $_POST['categorie'];
    // get image file:
    $file_name = '';
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $file_name = uniqid() . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], 'produitImages/' . $file_name);
    }
    if (!empty($libelle) && !empty($prix) && !empty($description) && !empty($categorie)) {
        if (!empty($file_name)) {
            $sqlState = $conx->prepare("UPDATE produit SET libelle=?,prix=?,discount=?,description=?,image=?,id_categorie =? WHERE id=?"
            );
            $update = $sqlState->execute([$libelle, $prix, $discount, $description, $file_name, $categorie, $id_produit]);
        } else {
            $sqlState = $conx->prepare("UPDATE produit SET libelle=?,prix=?,discount=?,description=?,id_categorie =? WHERE id=?"
            );
            $update = $sqlState->execute([$libelle, $prix, $discount, $description, $categorie, $id_produit]);
        }
        if ($update) {
            header('location:liste_produit.php');

        } else {
            ?>
    <div class="alert alert-danger text-capitalize" role="alert">
      database eroor!
    </div>
    <?php
}
    } else {
        ?>
    <div class="alert alert-danger" role="alert">
      you should enter libelle, prix and categorie!
    </div>
    <?php
}

}
?>
    <!-- php code end -->
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="libelle" class="form-label">libelle</label>
        <input name="libelle" type="text" class="form-control" id="libelle" value="<?=$data_produit['libelle']?>">
      </div>
      <div class="mb-3">
        <label for="prix" class="form-label">prix</label>
        <input name="prix" type="number" class="form-control" id="prix" step="0.1" min="0"
          value="<?=$data_produit['prix']?>">
      </div>
      <div class="mb-3">
        <label for="discount" class="form-label">discount</label>
        <input name="discount" type="number" class="form-control" id="discount" min="0" max="90"
          value="<?=$data_produit['discount']?>">
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" name="description" id="description"
          style="height: 100px;"><?=$data_produit['description']?></textarea>
        <label for="description" class="form-label">Descrition</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="image">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="mb-3 text-center">
        <img src="produitImages/<?=$data_produit['image']?>" class="object-fit-cover rounded" alt="produit image"
          width="100%" height="300">
      </div>
      <div class="mb-3">
        <label for="categorie" class="form-label">categorie</label>
        <select name="categorie" type="text" class="form-control" id="categorie">
          <?php
$sqlState = $conx->prepare("SELECT * FROM categorie");
$sqlState->execute();
$categories = $sqlState->fetchAll(PDO::FETCH_ASSOC);
?>
          <?php foreach ($categories as $categorie) {
    $selected = $categorie['id'] == $data_produit['id_categorie'] ? 'selected' : '';
    ?>
          <option <?=$selected?> value="<?=$categorie['id']?>">
            <?=$categorie['libelle']?></option>
          <?php }?>
        </select>
      </div>
      <button name="modifierProduit" type="submit" class="btn btn-primary">Modifier Produit</button>

    </form>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>