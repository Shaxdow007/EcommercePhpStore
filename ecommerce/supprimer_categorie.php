<?php
include 'include/database.php';
$id_categorie = $_GET['id_categorie'];
$sqlState = $conx->prepare('DELETE FROM categorie WHERE id=?');
$sqlState->execute([$id_categorie]);
header('location:liste_categorie.php');
