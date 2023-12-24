<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>liste des categorie || shadow007</title>
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <?php include 'include/nav.php';?>
  <?php include 'include/database.php';?>
  <div class="container py-5">
    <h4 class="mb-5 text-capitalize">modifier categorie</h4>
    <!-- php code start -->
    <?php
// get the values from get method than display them in the inputs:
$id_categorie = $_GET['id_categorie'];
$sqlState = $conx->prepare("SELECT * FROM categorie WHERE id=?");
$sqlState->execute([$id_categorie]);
$data_categorie = $sqlState->fetch(PDO::FETCH_ASSOC);
// modify :
if (isset($_POST['modifierCategorie'])) {
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
    if (!empty($libelle) && !empty($description) && !empty($icon)) {
        $update = $conx->prepare("UPDATE categorie SET libelle=?,description=?,icon=? WHERE id=?");
        $update->execute([$libelle, $description, $icon, $id_categorie]);
        header('location:liste_categorie.php');
    } else {
        ?>
    <div class="alert alert-danger" role="alert">
      you should enter libelle, icon and description!
    </div>
    <?php
}

}
?>
    <!-- php code end -->
    <form action="" method="post">
      <div class="mb-3">
        <label for="exampleInputlibelle" class="form-label">libelle</label>
        <input name="libelle" type="text" class="form-control" id="exampleInputlibelle"
          value="<?=$data_categorie['libelle']?>">
      </div>
      <div class="mb-3">
        <label for="icon" class="form-label">icon</label>
        <input name="icon" type="text" class="form-control" id="icon" value="<?=$data_categorie['icon']?>">
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="enter a description about catigorie" name="description"
          id="description" style="height: 100px;"><?=$data_categorie['description']?></textarea>
        <label for="description" class="form-label">Descrition</label>
      </div>
      <button name="modifierCategorie" type="submit" class="btn btn-primary">Modifier Catigorie</button>
    </form>

  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>