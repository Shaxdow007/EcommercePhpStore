<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>liste des categorie || shadow007</title>
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- fontawsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <?php include 'include/nav.php';?>
  <?php include 'include/database.php';?>
  <div class="container py-5">
    <h4 class="mb-5 text-capitalize">liste des categorie</h4>
    <!-- php code start -->
    <?php
$sqlState = $conx->prepare('SELECT * FROM categorie');
$sqlState->execute();
$liste_categories = $sqlState->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- php code end -->
    <table class="table table-stiped table-hover">
      <thead>
        <tr class="text-capitalize">
          <th>ID catigorie</th>
          <th>libelle</th>
          <th>description</th>
          <th>icons</th>
          <th>date creation</th>
          <th>operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
foreach ($liste_categories as $liste_categorie) {
    ?>
        <tr>
          <td><?=$liste_categorie['id']?></td>
          <td><?=$liste_categorie['libelle']?></td>
          <td><?=$liste_categorie['description']?></td>
          <td><i class="<?=$liste_categorie['icon']?>"></i></td>
          <td><?=$liste_categorie['date_creation']?></td>
          <td><a class="btn btn-warning text-capitalize me-2 my-2"
              href="modifier_categorie.php?id_categorie=<?=$liste_categorie['id']?>">modifier</a> <a
              class="btn btn-danger text-capitalize"
              href="supprimer_categorie.php?id_categorie=<?=$liste_categorie['id']?>"
              onclick="return confirm('you want to delet <?=$liste_categorie['libelle']?>!')">supprimer</a>
          </td>
          <?php }?>
        </tr>
      </tbody>
    </table>
    <a class="d-block my-4" href="ajouter_categorie.php"><button class="btn btn-primary text-capitalize">ajouter
        categorie</button></a>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>