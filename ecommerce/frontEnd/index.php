<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categories || shadow007</title>
  <!-- bootstrap css -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php require_once '../include/navbar.php';?>
  <div class="container py-5">
    <h4 class="mb-5 text-capitalize"><i class="fa-solid fa-store"></i> categories :</h4>
    <!-- php code start -->
    <?php
require_once '../include/database.php';
$sqlState = $conx->prepare('SELECT * FROM categorie');
$sqlState->execute();
$categories = $sqlState->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- php code end -->
    <ul class="list-group list-group-flush text-capitalize">
      <?php foreach ($categories as $categorie) {?>
      <li class="list-group-item"><a
          class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
          href="categorie.php?id=<?=$categorie['id']?>"><i class="<?=$categorie['icon']?>"></i>
          <?=$categorie['libelle']?></a></li>
      <?php }?>
    </ul>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>