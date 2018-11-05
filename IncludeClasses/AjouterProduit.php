<?php
/**
 * Created by PhpStorm.
 * User: loubou
 * Date: 05/06/2018
 * Time: 04:25
 */
/**********************checkImage()******************************/
function checkImageThenUpload($image,$numero,$description,$instruction,$unite,$prix)
{
    $GLOBALS['image']='';
    $errors='';
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image["name"]);//$_FILES["image"]
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if($image["tmp_name"]!='') {
        if ( @getimagesize($image["tmp_name"]) != false) {
            $errors .= "File is an image - " . getimagesize($image["tmp_name"])["mime"] . ".";
            $uploadOk = 1;
        } else {
            $errors .= "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check file size
    if ($image["size"] > 500000) {
        $GLOBALS['image'] .= "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $GLOBALS['image'] .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $GLOBALS['image'].= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        $isUploaded= uploadDB($imageFileType,$numero,$description,$instruction,$unite,$prix);
        }
        if ( isset($isUploaded) && $isUploaded && move_uploaded_file($image["tmp_name"], $target_file) && rename($target_file, $target_dir . $numero . '.' . $imageFileType)) {

        } else {
            $GLOBALS['image'] .= "Sorry, there was an error uploading your file.";
        }
    }



function uploadDB($imageFileType,$numero,$description,$instruction,$unite,$prix)
{


    //connecti
    $GLOBALS['errors'] = "";
    $connexionBD = ConnexionBD::getInstance();
    $req = $connexionBD->prepare(
        "INSERT INTO `article` (`numero`,`description`,`extension` ,`instruction`, `unite`, `prix`) 
VALUES (:numero, :description ,:extension , :instruction, :unite , :prix)");
    $numero = preg_replace('/\s+/', '', $numero);//$_POST['numéro']
    $instruction = preg_replace('/\s+/', ' ', $instruction);//$_POST['instruction']
    $prix = preg_replace('/\s+/', ' ', $prix);//$_POST['prix']
    $description = preg_replace('/\s+/', ' ', $description);//$_POST['description']
    try {
        $reponse = $req->execute(array(':numero' => $numero,
            ':description' => $description,
            ':extension' => $imageFileType,
            ':instruction' => $instruction,
            ':unite' => $unite,//$_POST['unité']
            ':prix' => abs(floatval($prix))));//$_POST['prix']
    } catch (PDOException $exception)//exception si l'id existe déja
    {
        if ($exception->getCode() == 23000) {
            $GLOBALS['errors']['numéro'] = "ce numéro existe déja";
            $GLOBALS['values']['numéro'] = $numero;
            $GLOBALS['values']['description'] = $description;
            $GLOBALS['values']['instruction'] = $instruction;
            $GLOBALS['values']['unité'] = $unite;
            $GLOBALS['values']['prix'] = $prix;
            return false;
        }


    }
    return true;


}










/**************************************************************/
if (isset($_POST['submit'])) {
    checkImageThenUpload($_FILES["image"],$_POST['numéro'],$_POST['description'],$_POST['instruction'],$_POST['unité'],$_POST['prix']);
}
function getError($err)
{
    if (isset($GLOBALS['errors']["$err"])) {
        echo $GLOBALS['errors']["$err"];
        return;
    } else if (isset($GLOBALS["$err"])) {
        echo $GLOBALS["$err"];
        return;
    } else {
        echo "";
        return;
    }
}
function getValue($val)
{
    if (isset($GLOBALS['values']["$val"]))
        echo $GLOBALS['values']["$val"];
    else
        echo "";
}