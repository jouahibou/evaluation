
<?php

session_start();

class db extends config
{





    public function controlAge()
    {


        $dateNaissance = $_POST['bday'];
        $aujourdhui = date("Y-m-d");
        $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));

        $ageInYears = $diff->format('%y');
        if ($ageInYears < 18)
            return  false;
        else
            return true;
    }



    public function controleMail($email)
    {

        $sql_e = "SELECT * FROM user WHERE email='$email'";
        $db = mysqli_connect('localhost', 'root', '', 'evaluation');

        $res_e = mysqli_query($db, $sql_e);

        if (mysqli_num_rows($res_e) > 0)
            return false;
        else
            return true;
    }



    public function Login($emailid, $password)
    {
        $res = "SELECT * FROM user WHERE email = '" . $emailid . "' AND mot_de_pass = '" . md5($password) . "'";
        $db = mysqli_connect('localhost', 'root', '', 'evaluation');
        $res_e = mysqli_query($db, $res);

        $user_data = mysqli_fetch_array($res_e);

        if (mysqli_num_rows($res_e) > 0) {

            $_SESSION['login'] = true;
            $_SESSION['username'] = $user_data['Prenom'];
            $_SESSION['email'] = $user_data['nom'];
            return TRUE;
        } else
            return FALSE;
    }


    public function addPerson(Personne $personne)
    {
        try {
            $nom = $personne->getNom();
            $prenom = $personne->getPrenom();
            $datedeNaiss = $personne->getDateNaissance();
            $email = $personne->getEmail();
            $adresse = $personne->getAdresse();
            $sexe = $personne->getSexe();
            $mdp = $personne->getPassword();
            $hash = md5($mdp);

            $sql = "INSERT INTO user (prenom,nom,email,mot_de_pass,date_naissance,adresse,sexe) VALUES (?,?,?,?,?,?,?)";
            $res = $this->connect()->prepare($sql);
            $res->execute(array($prenom, $nom, $email, $hash, $datedeNaiss, $adresse, $sexe));
            echo 'Bien sa marche';
        } catch (Exception $e) {
            echo "Erreur" . $e->getMessage();
        }
    }




    public function deletePerson($id)
    {


        $sql_e = "DELETE FROM user WHERE id ='$id'";
        $db = mysqli_connect('localhost', 'root', '', 'evaluation');
        if (mysqli_query($db, $sql_e))
            header("Location:Acceuil.php");
        else
            echo " on a un probléme ";




        // header("location:Acceuil.php");
    }

    public function detail($id)
    {

        $sql =   "SELECT * FROM user WHERE id = '$id'";
        $res = $this->connect()->query($sql);

        $row = $res->fetch();
        return $row;
    }

    public function upgrade($id, $prenom, $nom, $dateNaissance, $password, $email, $adresse)
    {


        $sql_e = "UPDATE user SET Prenom = '$prenom', nom ='$nom', email='$email',mot_de_pass='$password', date_naissance='$dateNaissance', adresse='$adresse'  WHERE id = '$id'";
        $db = mysqli_connect('localhost', 'root', '', 'evaluation');
        if (mysqli_query($db, $sql_e))
            header("Location:Acceuil.php");
        else
            echo " on a un probléme ";
    }
}
