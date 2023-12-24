<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter Categorie || shadow007</title>
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
  <?php include 'include/nav.php';?>
  <div class="container py-5">
    <h4 class="mb-3 text-capitalize">Ajouter Catigorie</h4>
    <!-- php code start -->
    <?php
if (isset($_POST['ajouterCategorie'])) {
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
    $date = date('Y-m-d');
    if (!empty($libelle) && !empty($description) && !empty($icon)) {
        require_once 'include/database.php';
        $sqlState = $conx->prepare('SELECT * FROM categorie WHERE libelle=?');
        $sqlState->execute([$libelle]);
        if ($sqlState->rowCount() >= 1) {
            ?>
    <div class="alert alert-danger" role="alert">
      this catigorie existing!
    </div>
    <?php
} else {
            if (!empty($libelle) && !empty($description) && !empty($icon)) {
                $sqlState = $conx->prepare('INSERT INTO categorie VALUES(null,?,?,?,?)');
                $sqlState->execute([$libelle, $description, $icon, $date]);
                ?>
    <div class="alert alert-success" role="alert">
      the catigorie is inserted good!
    </div>
    <?php
} else {
                ?>
    <div class="alert alert-danger" role="alert">
      you should enter libelle ,icon and description!
    </div>
    <?php
}
        }}}
?>
    <!-- php code end -->
    <form action="" method="post">
      <div class="mb-3">
        <label for="exampleInputlibelle" class="form-label">libelle</label>
        <input name="libelle" type="text" class="form-control" id="exampleInputlibelle">
      </div>
      <div class="mb-3">
        <label for="icon" class="form-label">icon</label>
        <input name="icon" type="text" class="form-control" id="icon">
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" name="description" id="description" style="height: 100px;"></textarea>
        <label for="description" class="form-label">Descrition</label>
      </div>
      <button name="ajouterCategorie" type="submit" class="btn btn-primary">Ajouter Catigorie</button>
    </form>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>