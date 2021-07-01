<?php

require  'configuration.php';
require  'personne.php';
require 'formulaire.php';




if (isset($_POST['inscription'])) {


    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['password']) && !empty($_POST['adress'])) {

        $obj = new db;
        $personne = new Personne($_POST['prenom'], $_POST['nom'], $_POST['bday'], $_POST['adress'], $_POST['mail'], $_POST['flexRadioDefault'], $_POST['password']);
        $obj->connect();
        var_dump($obj->controleMail($_POST['mail']));

        if ($obj->controlAge() != true) {
            echo "<script>alert('Interdit au moins de 18 ans ');</script>";
            echo "<script>window.location.href = 'devoir (2).php';</script>";
        } elseif ($obj->controleMail($_POST['mail']) != true) {

            echo "<script>alert('cette email est deja dans notre base de donnée');</script>";
            echo "<script>window.location.href ='devoir (2).php';</script>";
        } else

            $obj->addPerson($personne);
        echo "<script>alert('records added successfully');</script>";
        echo "<script>window.location.href = 'devoir (2).php';</script>";
    }
}

if (isset($_POST['connexion'])) {
    $obj = new db();
    $obj->connect();

    $emailid = $_POST['username'];
    $password = $_POST['password1'];
    $user = $obj->login($emailid, $password);
    if ($user)

        // Registration Success  
        header("location:home.php");
    else
        // Registration Failed  
        echo "<script>alert('Emailid / Password Not Match')</script>";
    echo "<script>window.location.href = 'devoir (2).php';</script>";
}


if (isset($_GET['idD']) && !empty($_GET['idD'])) {
    $obj = new db();
    $obj->connect();
    $deleteId = $_GET['idD'];
    $obj->deletePerson($deleteId);
}

if (isset($_GET['idM']) && !empty($_GET['idM'])) {


    $name = $_POST['nom'];
    $firstName = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $bday = $_POST['bday'];
    $adresse = $_POST['adress'];

    $obj = new db();
    $obj->connect();
    $ModifId = $_GET['idM'];
    $obj->upgrade($ModifId, $name, $firstName, $bday, $password, $mail, $adresse);
}
if (isset($_POST['modifier'])) {

    echo "<script>alert('mangui ci biir mais dess na na ')</script>";
    if (isset($_GET['idM']) && !empty($_GET['idM'])) {

        echo "<script>alert('mangui ci biir')</script>";

        $ModifId = $_GET['idM'];
        $name = $_POST['nom'];
        $firstName = $_POST['prenom'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $bday = $_POST['bday'];
        $adresse = $_POST['adress'];

        $obj = new db();
        $obj->connect();

        $obj->upgrade($ModifId, $name, $firstName, $bday, $password, $mail, $adresse);
    }
}
