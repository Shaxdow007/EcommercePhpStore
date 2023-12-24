<?php
include 'include/database.php';
$id_produit = $_GET['id_produit'];
$sqlState = $conx->prepare('DELETE FROM produit WHERE id=?');
$sqlState->execute([$id_produit]);
header('location:liste_produit.php');
