<?php



$con = ConnexionBD::getInstance();
include "addProd.php";

function generateProd()
{
    global $con;

    $req = 'select * from article ';
    $requete = $con->prepare($req);
    $requete->execute();

    $row = $requete->fetch(PDO::FETCH_BOTH);
    $i = 1;
    while ($row) {
        if ($i == 1) {
            ?>
        <?php }

        ?>
        <form method="post">
        <div class="col span_1_of_3 prod-block clearfix" align="center" style="margin-bottom: 90px">
            <span id="<?php echo $row['numero']; ?>">
              <label>Nom: </label><input hidden name="nomArticle"  value="<?php echo $row['description'] ?>" ><?php echo $row['description'] ?>
            </span>

        <figure class="prod">
            <div class="prod-shadow"></div>
            <img height="270px" width="360px" class="col span_3_of_3"
                 src="uploads/<?php echo $row['numero'] . '.' . $row['extension'] ?>">
            <ul>
                <li>No:<input hidden name="numArticle" value="<?php echo $row['numero']; ?>"><?php echo $row['numero']; ?></li><br>
                <li>Unité:<input hidden name="UniArticle" value="<?php echo $row['unite']; ?>"><?php echo $row['unite']; ?></li><br>
                <li>Prix/Pack:<input hidden name="prixArticle" value="<?php echo $row['prix']; ?>"><?php echo $row['prix']; ?> DT</li><br>
                <li><button type="button" class="btn btn-primary" value="<?php echo $row['instruction'] ?>" onclick="dialog(value)"><i class="fa fa-pencil"></i> Instructions</button></li>
            </ul>
        </figure>
            <br>
            <input type="number" name="quantité" min="1" value="1" style="width: 45px;border-radius: 5px" />
            <input name="submit" type="submit" class="btn btn-light" value="commander">
            <br>


            </form>



        </div>











        <?php
        $row = $requete->fetch(PDO::FETCH_BOTH);
        $i++;
        if ($i == 4) {
            $i = 1; ?>

        <?php }

    }


}



function generateServ()
{
    global $con;
    $req = 'select * from service ';
    $requete = $con->prepare($req);
    $requete->execute();

    $row = $requete->fetch(PDO::FETCH_BOTH);
    $i = 1;
    while ($row) {


        ?>
        <div class="service-list" id="<?php echo $row['numero']?>s">
            <div class="service-list-col1">
                <i class="fa fa-briefcase"></i>
            </div>

            <div class="service-list-col2">
                <h3 style="font-size:20px; margin:0 0 15px 0;text-align:center;text-transform:uppercase;font-weight:500;"> <?php echo $row['nom'] ?></h3>
                <p> <?php echo $row['description']; ?></p>
            </div>
        <br>
        <?php
        $row = $requete->fetch(PDO::FETCH_BOTH);
        $i++;
        if ($i == 2) {
            $i = 1; ?>
            </div>
        <?php }

    }


}