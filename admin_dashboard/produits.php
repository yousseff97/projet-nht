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
include "../IncludeClasses/AfficherProduit.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href="../css/admin.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../js/admin.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="../css/produit_ajouté.css">
    <style>

        .delete_button:enabled {
            color: white;
            background: red;
        }

        .delete_button:hover {

            background: #c00;
        }

    </style>
    <script>
        function dialog(value) {

            $('#' + value).dialog({
                modal: true,
                buttons: {
                    'delete': {
                        text: 'delete',
                        "class": "delete_button",
                        click: function () {

                            $('#delete-form-' + value).click();
                        }

                    },
                    'update': function () {

                        $('#update-form-' + value).click();
                    }

                },
                draggable: false,
                height: window.screen.width/2.5,
                width:window.screen.width/2

            });

        };
    </script>
</head>

<body class="home" style="max-width: 1300px;margin: auto ">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
                <a href="../index.php"><img src="../img/footer-logo.png" alt="nht_logo" class="hidden-xs hidden-sm">
                    <img src="../img/small-logo.png" alt="nht_logo" class="visible-xs visible-sm circle-logo">
                </a>
            </div>
            <div class="navi" style="height: 380vh">
                <ul>
                    <li><a href="adminpage.php"><i class="fa fa-home" aria-hidden="true"></i><span
                                    class="hidden-xs hidden-sm">Accueil</span></a></li>
                    <li class="active"><a href="produits.php"><i class="fa fa-diamond" aria-hidden="true"></i><span
                                    class="hidden-xs hidden-sm">Produits</span></a></li>
                    <li><a href="services.php"><i class="fa fa-suitcase" aria-hidden="true"></i><span
                                    class="hidden-xs hidden-sm">Services</span></a></li>
                    <li><a href="commande.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="hidden-xs hidden-sm">commandes</span></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
            <div class="row">
                <header style="background-color: transparent">
                    <div class="col-md-7">
                        <nav class="navbar-default pull-left">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas"
                                        data-target="#side-menu" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </nav>
                        <div class="search hidden-xs hidden-sm">

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
                <h1>Produit</h1>
                <div class="row">
                    <div class="col-md-6 form-line">
                        <div class="add">
                            <h2 align="center">ajouter un produit</h2><br>
                            <section id="contact">
                                <form method="post" enctype=multipart/form-data>
                                    <div class="col-md-6 form-line">
                                        <div class="form-group">
                                            <label for="numéro">No</label>
                                            <input required type="text" class="form-control" id="numéro" name="numéro"
                                                   value="<?php getValue('numéro'); ?>">
                                            <?php getError('numéro'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description of Goods</label>
                                            <input type="text" class="form-control" id="description" name="description"
                                                   value="<?php getValue('description'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Picture</label>
                                            <input type="file" class="img-control" id="image" accept="image/*"
                                                   name="image" required>
                                            <span class="error"> <?php getError('image'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="instruction">Instruction</label>
                                            <textarea name="instruction" class="form-control" id="instruction" cols="30"
                                                      rows="5" placeholder="ajouter instruction"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="unité">Unit</label>
                                            <input type="text" class="form-control" id="unité" name="unité"
                                                   value="<?php getValue('unité'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="prix">Prix/Pack(DT)</label>
                                            <input type="text" class="form-control" id="prix" name="prix"
                                                   value="<?php getValue('prix'); ?>">
                                        </div>
                                        <div>
                                            <input type="submit" name="submit" class="btn btn-default submit">
                                            <button id="reset" class="btn btn-default submit" onclick="resetValues();">
                                                reset
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </section>
                        </div>
                    </div>

                    <div class="col-md-6 form-line">
                        <div class="add">
                            <h2 align="center">les produits ajoutés</h2>

                            <?php generateRow(); ?>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>


</body>
<script src="../js/scriptAdmin.js"></script>
</html>