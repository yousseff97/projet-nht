<?php
/**
 * Created by PhpStorm.
 * User: Galmami Oussama
 * Date: 21/06/2018
 * Time: 18:57
 */


function uploadDB($numero,$nom,$description)
{


    //connecti
    $GLOBALS['errorServ'] = "";
    $connexionBD = ConnexionBD::getInstance();
    $req = $connexionBD->prepare(
        "INSERT INTO `service` (`numero`,`nom`,`description`) 
VALUES (:numero, :nom, :description)");
    $numero = preg_replace('/\s+/', '', $numero);//$_POST['numero1']
    $nom = preg_replace('/\s+/', ' ', $nom);//$_POST['name1']
    $description = preg_replace('/\s+/', ' ', $description);//$_POST['description1']
    try {
        $reponse = $req->execute(array(':numero' => $numero,
            ':description' => $description,
            ':nom' => $nom));
    } catch (PDOException $exception)//exception si l'id existe déja
    {
        if ($exception->getCode() == 23000) {
            $GLOBALS['errors1']['numero1'] = "ce numéro existe déja";
            $GLOBALS['values1']['numero1'] = $numero;
            $GLOBALS['values1']['name1'] = $nom;
            $GLOBALS['values1']['description1'] = $description;

            return false;
        }


    }
    return true;


}



if (isset($_POST['submit1'])) {
    uploadDB($_POST['numero1'],$_POST['name1'],$_POST['description1']);
}

function getError1($err)
{
    if (isset($GLOBALS['errors1']["$err"])) {
        echo $GLOBALS['errors1']["$err"];
        return;
    } else if (isset($GLOBALS1["$err"])) {
        echo $GLOBALS["$err"];
        return;
    } else {
        echo "";
        return;
    }
}
function getValue1($val)
{
    if (isset($GLOBALS['values1']["$val"]))
        echo $GLOBALS['values1']["$val"];
    else
        echo "";
}

