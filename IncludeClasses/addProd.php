<?php



if (isset($_POST["submit"])){

    $_SESSION['basket'][$_POST['numArticle']]['id']=$_POST['numArticle'];
    $_SESSION['basket'][$_POST['numArticle']]['nom']=$_POST['nomArticle'];
    $_SESSION['basket'][$_POST['numArticle']]['prix']=$_POST['prixArticle'];
    $_SESSION['basket'][$_POST['numArticle']]['quantité']=intval($_POST['quantité']);

    header("Refresh:0");


}



