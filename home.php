<?php


require  'configuration.php';
require  'personne.php';
require 'formulaire.php';


if (!($_SESSION)) {
    echo "<script>window.location.href = 'devoir (2).php';</script>";
}

?>


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <title>Login and Registration Form with HTML5 and CSS3</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/solar/bootstrap.min.css">

</head>

<body>
    <div class="col-md-4 mx-auto p-5">
        <div class="card text-white bg-success mb-6" style="max-width: 20rem;">

            <div class="card-header">Connection reussit</div>
            <div class="card-body">
                <h4 class="card-title">Bienvenue </h4>
                <p class="card-text"><?= $_SESSION['username'] ?> <?= $_SESSION['email'] ?> </p>
            </div>

            <a href="Acceuil.php" class="btn btn-info" role="button" aria-pressed="true">All User</a>
            <a href="Deconnexion.php" class="btn btn-secondary" role="button" aria-pressed="true">Deconnexion</a>






        </div>
    </div>

</body>

</html>