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
    <h4 class="mb-5 text-capitalize">liste des produit</h4>
    <!-- php code start -->
    <?php
$sqlState = $conx->prepare('SELECT produit.*,categorie.libelle as "categorie_libelle" FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id');
$sqlState->execute();
$liste_produits = $sqlState->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- php code end -->
    <table class="table table-stiped table-hover">
      <thead>
        <tr class="text-capitalize">
          <th>ID produit</th>
          <th>libelle</th>
          <th>prix</th>
          <th>prix finale</th>
          <th>images</th>
          <th>categorie libelle</th>
          <th>date creation</th>
          <th>Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
foreach ($liste_produits as $liste_produit) {
    // prix final:
    $prix = $liste_produit['prix'];
    $discount = $liste_produit['discount'];
    $prix_finale = $prix - (($prix * $discount) / 100);

    ?>
        <tr>
          <td><?=$liste_produit['id']?></td>
          <td><?=$liste_produit['libelle']?></td>
          <td><?=$prix?>MAD</td>
          <td><?=$prix_finale?>MAD</td>
          <td><img src="produitImages/<?=$liste_produit['image']?>" class="object-fit-cover border rounded" width="200"
              height="150" alt="<?=$liste_produit['libelle']?>"> </td>
          <td><?=$liste_produit['categorie_libelle']?></td>
          <td><?=$liste_produit['date_creation']?></td>
          <td><a class="btn btn-warning text-capitalize me-2 my-2"
              href="modifier_produit.php?id_produit=<?=$liste_produit['id']?>">modifier</a> <a
              class="btn btn-danger text-capitalize" href="supprimer_produit.php?id_produit=<?=$liste_produit['id']?>"
              onclick="return confirm('do you want to delete <?=$liste_produit['libelle']?>')">supprimer</a>
          </td>

          <?php }?>
        </tr>
      </tbody>
    </table>
    <a class="d-block my-4" href="ajouter_produit.php"><button class="btn btn-primary text-capitalize">ajouter
        produit</button></a>

  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>