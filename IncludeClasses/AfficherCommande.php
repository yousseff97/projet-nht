<?php
/**
 * Created by PhpStorm.
 * User: GALMAMI Oussama
 * Date: 20/08/2018
 * Time: 13:45
 */


if (isset($_POST["payer"])){
    $id = $_POST['payer'];
    $connexionBD = ConnexionBD::getInstance();
    $req = $connexionBD->prepare('UPDATE `commande` SET `etat`=:etat WHERE `id`= :id');
    $req->execute(array(':etat'=>'payée','id'=>$id));
    header("Refresh:0");

}

if (isset($_POST["annuler"])){
    $id = $_POST['annuler'];
    $connexionBD = ConnexionBD::getInstance();
    $req = $connexionBD->prepare('UPDATE `commande` SET `etat`=:etat WHERE `id`= :id');
    $req->execute(array(':etat'=>'annulée','id'=>$id));
    header("Refresh:0");

}

$con = ConnexionBD::getInstance();
function generateCommande(){
    global $con;
    $req = 'select * from commande ';
    $requete = $con->prepare($req);
    $requete->execute();

    $row = $requete->fetch(PDO::FETCH_BOTH);




    ?>
<div class="table-responsive-vertical shadow-z-1">
      <table id="table" class="table table-hover table-mc-light-blue table-striped">
            <thead>
            <tr>
                <th>Client </th>
                <th>Email</th>
                <th>tel</th>
                <th>Description</th>
                <th>Montant</th>
                <th>Statut</th>
                <th>action</th>
            </thead>
     <tbody>
    <?php
    while ($row){
        ?>

            <tr>
                <td data-title="Client"><?php echo $row['nom']." ".$row['prenom'];?></td>
                <td data-title="Email"><?php echo $row['email'];?></td>
                <td data-title="Tel"><?php echo $row['tel'];?></td>
                <td data-title="Description"><?php echo $row['description'];?></td>
                <td data-title="Montant"><?php echo $row['prix']." DT";?></td>
                <td data-title="Statut"><?php echo $row['etat'];?></td>
                <td data-title="Action">
                    <form method="post">
                        <button class="btn btn-success btn-block" type="submit" name="payer" value="<?php echo $row['id'] ;?>">confirmer</button>
                    </form>
                    <form  method="post">
                        <button class="btn  btn-warning btn-block" type="submit" name="annuler" value="<?php echo $row['id'] ;?>">annuler</button>
                    </form>

                </td>
            </tr>

        <?php
        $row = $requete->fetch(PDO::FETCH_BOTH);
    }
}
?>
     </tbody>
      </table>
</div>
