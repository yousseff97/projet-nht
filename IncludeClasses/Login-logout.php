<?php
/**
 * Created by PhpStorm.
 * User: loubou
 * Date: 28/05/2018
 * Time: 18:32
 */
include "AutoLoad.php";
session_start();
if (isset($_POST['login'])) {
    $connexionBD = ConnexionBD::getInstance();
    $req = $connexionBD->prepare('select * from admin WHERE login= :login and password= :password');
    $reponse=$req->execute(array('login' => $_POST['uname'], 'password' => $_POST['psw']));
    if($req->fetch(PDO::FETCH_BOTH)!=null){
        $_SESSION['loggedIn']=true;
        header('Location:admin_dashboard/adminpage.php');
    }
}
if(isset($_POST['logout']))
{
    session_destroy();
    header('Refresh:0');
}


/******************  change password  ************/

function getAdmin()
{

    $connexionBD = ConnexionBD::getInstance();
    $req = $connexionBD->prepare('select * from admin');
    $req->execute();
    return $req->fetch(PDO::FETCH_BOTH);

}

function changeLogin($login)
{

    $connexionBD = ConnexionBD::getInstance();
    $req = $connexionBD->prepare('UPDATE `admin` SET `login`=:login WHERE `id`=1');
    $req->execute(array(':login'=>$login));


}
function changePass($pass)
{

    $connexionBD = ConnexionBD::getInstance();
    $req = $connexionBD->prepare('UPDATE `admin` SET `password`=:password WHERE `id`=1');
    $req->execute(array(':password'=>$pass));


}



if(isset($_POST['changeLogin'])){

    $account=getAdmin();
    if($_POST['pws1']==$account['password'])
    {
        changeLogin($_POST['Nouveaulogin']);
        ?>
        <script>alert('votre login a été mis à jour ');</script>

        <?php
    }
    else{
        ?>
<script>alert('mot de passe incorrect');</script>

<?php

    }


}



if(isset($_POST['changePass'])){

    $account=getAdmin();
    if($_POST['oldpws']==$account['password'])
    {
        changePass($_POST['newpws']);
        ?>
        <script>alert('votre mot de passe a été mis à jour ');</script>

        <?php
    }
    else{
        ?>
        <script>alert('mot de passe incorrect');</script>

        <?php

    }


}












