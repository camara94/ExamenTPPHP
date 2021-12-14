<?php
session_start();
require_once 'connexion.class.php';
$connexion = new Connexion();
?>
<!DOCTYPE html>
<html lang="en">
<style>
    form,
    p {
        width: 800px;
        margin: 0px auto;
    }

    table {
        width: 600px;
        text-align: center;
    }

    table>td table>th {
        text-align: center;
    }

    p {
        margin-top: 30px;
        margin-bottom: 30px;
        color: blue;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Article</title>
</head>

<body>
    <form method="POST" action="suppArticle.php">
        <h1>Bienvenue dans votre espace personnel</h1>
        <p>[<a href="deconnexion.php">Se déconnecter</a>]</p>

        <table border="1">
            <tr>
                <th><input type="submit" value="supprimer"></th>
                <th>TITRE</th>
                <th>AUTRE</th>
            </tr>
            <?php
            $article = $connexion->selection('SELECT * FROM article');
            foreach ($article as $key => $value) {
            ?>
                <tr>
                    <td>
                        <input type="checkbox" name="<?= $value['titre'] . $value['id_article'] ?>" value="<?= $value['id_article'] ?>" />
                    </td>
                    <td>
                        <?= $value['titre'] ?>
                    </td>

                    <td>
                        <?= $value['auteur'] ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>

    <p>Page : <?= $_SESSION['row'] ?> listeArticle.php</p>
</body>

</html>

<?php
if (empty($_SESSION['id_user'])) {
    header('Location: login.php');
}

/*$connexion = new Connexion();
for ($i = 1; $i < 5; $i++) {
    $connexion->execution('INSERT INTO article(titre, auteur) VALUES("TITRE' . $i . '", "AUTEUR ' . $i . '")');
}*/
