<?php
class config
{

    //Declaration des variables
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    //Connexion a la base de donnees
    public function connect()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'evaluation';
        $this->charset = 'utf8mb4';

        try {
            $db = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";password=" . $this->password . ";charset=" . $this->charset;
            $pdo = new PDO($db, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
