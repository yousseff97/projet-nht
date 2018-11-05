<?php
session_start();
include "AutoLoad.php";

$montant = $_SESSION['total'];
$desc = "";

foreach ( $_SESSION['basket'] as $object ){
    $desc =  $desc . $object['id'] ."_q_".$object['quantité'] . "\n";
}

if (isset($_POST['submitClient'])) {
    $connexionBD = ConnexionBD::getInstance();
    $req = $connexionBD->prepare('INSERT INTO `commande`(`nom`, `prenom`, `email`, `tel`, `description`, `prix`) VALUES (:nom,:prenom,:email,:tel,:description,:prix)');
    $reponse = $req->execute(array('nom' => $_POST['nomClient'], 'prenom' => $_POST['prenomClient'], 'email' => $_POST['emailClient'], 'tel' => $_POST['telClient'], 'description' => $desc, 'prix' => $montant));

    unset($_SESSION['basket']);
    header("Location:../");

}

?>