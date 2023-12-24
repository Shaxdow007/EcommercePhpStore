<?php
session_start();
// check if the user is connected:
// var_dump($_SESSION['utilisateur']);
$connected = false;
if (isset($_SESSION['utilisateur'])) {
    $connected = true;
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav d-flex align-items-center ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Ajouter Utilisateur</a>
                </li>
                <!-- check if user is connected and change the nav bar -->
                <?php
if ($connected) {
    ?>
                <li class="nav-item">
                    <a class="nav-link" href="ajouter_categorie.php">Ajouter Categorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_categorie.php">Liste Des Categorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ajouter_produit.php">Ajouter Produit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_produit.php">Liste Des Produit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deconnexion.php"><button class="btn btn-danger">Deconnexion</button></a>
                </li>
                <?php
} else {
    ?>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.php"><button class="btn btn-success">Connexion</button></a>
                </li>
                <?php
}
?>


            </ul>
        </div>
    </div>
</nav>