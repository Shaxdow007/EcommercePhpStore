<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Utilisateur || shadow007</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <!-- php code start -->
    <?php include 'include/nav.php';?>
    <div class="container py-5">
        <h4 class="mb-3 text-capitalize">Ajouter utilisateur</h4>
        <?php

if (isset($_POST['ajouterUtilisateur'])) {
    // get vaiables
    $login = $_POST['login'];
    $password = $_POST['password'];
    // check if the login existng:
    if (!empty($login) && !empty($password)) {
        require_once 'include/database.php';
        $sqlState = $conx->prepare('SELECT * FROM utilisateur WHERE login=?');
        $sqlState->execute([$login]);
        if ($sqlState->rowCount() >= 1) {
            ?>
        <div class="alert alert-danger" role="alert">
            login is taking
        </div><?php
} else {
            // check if the variables is empty:
            if (!empty($login) && !empty($password)) {
                // conx to database using PDO:
                require_once 'include/database.php';
                // get the date:
                $date = date('Y-m-d');
                // insert into table utilisateur:
                $sqlState = $conx->prepare('INSERT INTO utilisateur VALUES(null,?,?,?)');
                $sqlState->execute([$login, $password, $date]);
                header('location: connexion.php');
            } else {
                ?>
        <div class="alert alert-danger" role="alert">
            you should enter login and password
        </div>
        <?php
}
        }

    }
}
?>
        <!-- php code end -->
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login || Email</label>
                <input name="login" type="text" class="form-control" id="exampleInputEmail1">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button name="ajouterUtilisateur" type="submit" class="btn btn-primary">Ajouter Utilisateur</button>
        </form>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>