<?php
/**
 * Created by PhpStorm.
 * User: loubou
 * Date: 28/05/2018
 * Time: 19:24
 */
include "../IncludeClasses/Login-logout.php";
if ($_SESSION['loggedIn'] == false) {
    header('Location:../login.php');
}
include "../IncludeClasses/AjouterProduit.php";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href="../css/admin.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../js/admin.js"></script>


</head>

<body class="home" style="max-width: 1300px;margin: auto">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
                <a href="../index.php"><img src="../img/footer-logo.png" alt="nht_logo" class="hidden-xs hidden-sm">
                    <img src="../img/small-logo.png" alt="nht_logo" class="visible-xs visible-sm circle-logo">
                </a>
            </div>
            <div class="navi" style="height: 100vh">
                <ul>
                    <li class="active"><a href="adminpage.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Accueil</span></a></li>
                    <li><a href="produits.php"><i class="fa fa-diamond" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Produits</span></a></li>
                    <li><a href="services.php"><i class="fa fa-suitcase" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Services</span></a></li>
                    <li><a href="commande.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="hidden-xs hidden-sm">commandes</span></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
            <div class="row">
                <header style="background-color: #f1f6f8">

                    <div class="col-md-7" >
                        <nav class="navbar-default pull-left">
                            <div class="navbar-header" >
                                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </nav>
                        <div class="search hidden-xs hidden-sm" >
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="header-rightside">
                            <ul class="list-inline header-top pull-right">
                                <form method="post" class="float-right">
                                    <button type="submit" name="logout" class="btn btn-danger">log out</button>
                                </form>

                            </ul>
                        </div>
                    </div>

                </header>
            </div>
            <div class="user-dashboard">
                <h1>Bienvenu, Monsieur Hkiri</h1>


                <div class="row">
                        <form  method="post" id="formChangeLogin">

                            <div class="col-md-6 form-line">
                                <h3>Modifier login:</h3>
                                <div class="form-group">
                                    <label for="pws1">mot de passe</label>
                                    <input class="form-control" id="pws1" name="pws1" required type="password">
                                </div>
                                <div class="form-group">
                                    <label for="login">Nouveau login</label>
                                    <input type="text"  class="form-control" id="login" name="Nouveaulogin" required>
                                </div>
                                <div>
                                    <button id="reset" type="button" class="btn btn-default submit" onclick="resetValues();">reset</button>
                                    <input type="submit" id="changeLogin" name="changeLogin" class="btn btn-default submit">

                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </form>
                        <form method="post">
                            <div class="col-md-6 form-line">
                                <h3>Modifier mot de passe:</h3>
                                <div class="form-group">
                                    <label for="oldpws">ancien mot de passe</label>
                                    <input type="password"class="form-control" id="oldpws" name="oldpws"  required>
                                </div>
                                <div class="form-group">
                                    <label for="newpws">Nouveau mot de passe</label>
                                    <input type="password"  class="form-control" id="newpws" name="newpws" required>
                                </div>
                                <div>
                                    <button id="reset" type="button" class="btn btn-default submit" onclick="resetValues();">reset</button>
                                    <input type="submit" name="changePass" class="btn btn-default submit">
                                </div>
                            </div>
                        </form>


                </div>
            </div>
        </div>
    </div>

</div>





</body>
</html>