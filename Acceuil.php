<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="joua3.css" rel="stylesheet">

    <title>Membre</title>
</head>

<?php

require  'configuration.php';
require 'formulaire.php';

require  'personne.php';


$mysqli = new mysqli('localhost', 'root', '', 'evaluation');
$mysqli->set_charset("utf8");
$requete = 'SELECT * FROM user';
$resultat = $mysqli->query($requete);

$obj = new db();
$obj->connect();

if (isset($_GET['idL']) && !empty($_GET['idL'])) {

    $detail = $_GET['idL'];
    $detaili = $obj->detail($detail);
?>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th> id </th>
                <th> Prenom </th>
                <th> Nom </th>
                <th> email </th>
                <th> dateNaissance </th>
                <th> adresse </th>
                <th> sexe </th>
            </tr>
        </thead>

        <tr>
            <th><?php if (isset($detaili)) echo $detaili['id']; ?></th>
            <th><?php echo $detaili['Prenom']; ?></th>
            <th><?php echo $detaili['nom']; ?></th>
            <th><?php echo $detaili['email']; ?></th>
            <th><?php echo $detaili['date_naissance']; ?></th>
            <th><?php echo $detaili['adresse']; ?></th>
            <th><?php echo $detaili['sexe']; ?></th>
        </tr>

    <?php

}

    ?>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th> id </th>
                <th> Prenom </th>
                <th> Nom </th>


                <th class="text-center">action</th>

            </tr>
        </thead>
        <?php
        while ($donnees = mysqli_fetch_array($resultat)) {
        ?>
            <tr>
                <th><?php if (isset($donnees)) echo $donnees['id']; ?></th>
                <th><?php echo $donnees['Prenom']; ?></th>
                <th><?php echo $donnees['nom']; ?></th>


                <td class="text-center">
                    <a class='btn btn-success btn-xs' href="Acceuil.php?idL=<?php if (isset($donnees)) echo $donnees['id']; ?>"><span class="glyphicon glyphicon-edit"></span> Details</a>
                    <a class='btn btn-info btn-xs' href="modification.php?idM=<?php if (isset($donnees)) echo $donnees['id']; ?>"><span class="glyphicon glyphicon-edit"></span> modifier</a>
                    <a href="traitement.php?idD=<?php if (isset($donnees)) echo $donnees['id']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> supprimer</a>
                </td>
            </tr>
        <?php
        }
        $mysqli->close();
        ?>
        <table>
            </body>

</html>