<?php
session_start();
require_once 'connexion.class.php';
$connexion = new Connexion();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        input {
            display: block;
            width: 200px;
            border-radius: 8px;
            margin: 10px;
            padding: 5px;
        }

        form {
            width: 600px;
            margin: 0px auto;
        }
    </style>
</head>

<body>

    <form method="POST">
        <h1>Authentification</h1>
        <?php if (empty($_POST['login']) && empty($_POST['passe'])) {
            echo '<div style="color:red; margin-top: 40px">Veuillez remplir tous les champs</div>';
        } ?>
        <input type="text" name="login" placeholder="Login">
        <input type="text" name="passe" placeholder="Mot de passe">
        <input type="submit" value="S'authentifier">
    </form>
    <?php if (isset($_SESSION['row'])) { ?>
        <p>Page : <?= $_SESSION['row'] ?> listeArticle.php</p>
    <?php } ?>
</body>

</html>

<?php
if (isset($_POST['login']) and isset($_POST['passe'])) {
    $request = 'SELECT * FROM user WHERE login="' . $_POST['login'] . '" AND motdepasse="' . $_POST['passe'] . '"';

    try {

        if (count($connexion->selection($request))) {
            $user = $connexion->selection($request)[0];
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['login'] = $user['login'];

            if (!empty($_SESSION['id_user']) and !empty($_SESSION['id_user'])) {
                header('Location: listeArticle.php');
            }
        } else {
            echo '<div style="color:red; margin-top: 40px">Veuillez vérifier vos identifiants</div>';
        }
    } catch (PDOException $e) {
        echo '<div style="color:red; margin-top: 40px">Veuillez vérifier vos identifiants</div>';
    }
}
