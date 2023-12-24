<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion || shadow007</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <!-- php code start -->
    <?php include 'include/nav.php';?>
    <div class="container py-5">
        <h4 class="mb-3 text-capitalize">Connexion</h4>
        <?php
if (isset($_POST['connexion'])) {
    // get vaiables
    $login = $_POST['login'];
    $password = $_POST['password'];
    // check if the variables is empty:
    if (!empty($login) && !empty($password)) {
        // conx to database using PDO:
        require_once 'include/database.php';
        // insert into table utilisateur:
        $sqlState = $conx->prepare('SELECT * FROM utilisateur WHERE login=? AND password=?');
        $sqlState->execute([$login, $password]);
        if ($sqlState->rowCount() >= 1) {
            $_SESSION['utilisateur'] = $sqlState->fetch();
            header('location:admin.php');
        } else {
            ?>
        <div class="alert alert-danger my-3" role="alert">
            login or password incorrect
        </div>

        <?php
}

    } else {
        ?>
        <div class="alert alert-danger my-3" role="alert">
            you need to insert login and password
        </div>
        <?php
}
}
?>
        <!-- code php end -->
        <form action="#" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login || Email</label>
                <input name="login" type="text" class="form-control" id="exampleInputEmail1">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button name="connexion" type="submit" class="btn btn-primary">Connexion</button>
        </form>
    </div>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>