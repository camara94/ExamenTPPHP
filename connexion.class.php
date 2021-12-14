<?php
class Connexion
{
    private $dbname = "br-article";
    private $host = "localhost";
    private $user = "root";
    private $passe = "";
    private $dbh;

    public function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->passe);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //print('Connexion réussie.');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function selection($requete)
    {
        $resulatat = $this->dbh->query($requete);
        $lig = [];
        while ($ligne = $resulatat->fetch()) {
            array_push($lig, $ligne);
        }

        $_SESSION['row'] = $resulatat->rowCount();
        return $lig;
    }

    public function execution($requete)
    {
        return $this->dbh->exec($requete);
    }
}
