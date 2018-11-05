

        <!--<form id="contact" action="" method="post">
            <h3>Coordonnées client</h3>
            <h4>Nous serons en contact</h4>
            <fieldset>
                <input name="nomClient" placeholder="Nom" type="text" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <input name="prenomClient" placeholder="Prenom" type="text" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <input name="emailClient" placeholder="Adresse email" type="email" tabindex="2" required>
            </fieldset>
            <fieldset>
                <input  name="telClient" placeholder="tel" type="tel" tabindex="3" required>
            </fieldset>


            <fieldset>
                <button class="btn btn-lg btn-primary btn-block btn-signin" name="submitClient" type="submit" id="contact-submit" >Passer commande</button>
                <button  type="submit"><a href="../panier.php">retourner au commande</a></button>
            </fieldset>

        </form>-->




<?php
include "commande.php" ;

if(isset($_POST["returnBasket"]))
{

    header("Location:../panier.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>coordonnee </title>

    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>

<div class="container">
    <div class="card card-container">

        <p id="profile-name" class="profile-name-card"></p>
        <h3>Coordonnées client</h3>
        <form class="form-signin" id="contact" action="" method="post">
            <span id="reauth-email" class="reauth-email"></span>

            <input  class="form-control" name="nomClient" placeholder="Nom" type="text" tabindex="1" required autofocus>

            <input  class="form-control" name="prenomClient" placeholder="Prenom" type="text" tabindex="1" required autofocus>

            <input class="form-control" name="emailClient" placeholder="Adresse email" type="email" tabindex="2" required>

            <input class="form-control"  name="telClient" placeholder="tel" type="number" tabindex="3" required>



            <span id="reauth-email" class="reauth-email"></span>
            <button class="btn btn-lg btn-primary btn-block btn-signin" name="submitClient" type="submit" id="contact-submit" >Passer commande</button>

        </form>
        <form method="post">
            <button class="btn btn-lg btn-primary btn-block btn-signin" name="returnBasket" type="submit" >retourner au panier</button>
        </form>

    </div><!-- /card-container -->
</div><!-- /container -->
</body>
</html>