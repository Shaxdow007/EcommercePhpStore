<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin || shadow007</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <!-- php code start -->
    <?php include 'include/nav.php';?>
    <div class="container py-5">
        <?php
if (!isset($_SESSION['utilisateur'])) {
    header('location:connexion.php');
} else {
    ?>
        <figure class="text-center">
            <blockquote class="blockquote">
                <p class="text-capitalize">Hello, <?=$_SESSION['utilisateur']['login']?></p>
            </blockquote>
            <figcaption class="blockquote-footer text-capitalize">
                Welcome back to our website!
            </figcaption>
        </figure> <?php
}
?>
        <!-- code php end -->
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>