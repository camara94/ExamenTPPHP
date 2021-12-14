<?php
session_start();
require_once 'connexion.class.php';
$connexion = new Connexion();


$id_articles = $_POST;
foreach ($id_articles as $key => $id) {
    $connexion->execution('DELETE FROM article WHERE id_article=' . $id);
}

if (!empty($_SESSION['id_user']) and !empty($_SESSION['id_user'])) {
    header('Location: listeArticle.php');
} else {
    header('Location: login.php');
}
