<?php
/**
 * Created by PhpStorm.
 * User: loubou
 * Date: 13/06/2018
 * Time: 07:51
 */
$con = ConnexionBD::getInstance();

function deleteDB($numero)
{
    global $con;
    $sql = 'DELETE FROM `article` WHERE `numero`=:numero';
    $requete = $con->prepare($sql);
    $requete->execute([':numero' => $numero]);


}

function checkValidity($numero,$oldnumero)
{
    if($numero!=$oldnumero){
    global $con;
    $sql = 'select numero  FROM `article` WHERE `numero`=:numero';
    $requete = $con->prepare($sql);
    $requete->execute([':numero' => $numero]);

    $resultat=$requete->fetch(PDO::FETCH_BOTH);
    if($resultat) {
        header("Refresh:0");

        ?>
        <script>
            alert("numéro déja éxistant");
            $($("button-" +<?php echo $numero; ?>).click());
        </script>


        <?php
        exit(0);
    }

    }


}



if (isset($_POST['delete'])) {
    deleteDB($_POST['delete']);
    unlink('../uploads/' . $_POST['delete'] . '.' . $_POST['extension']);

}


if (isset($_POST['update'])) {

    checkValidity($_POST['numéro_modifié'],$_POST['update']);
    deleteDB($_POST['update']);



    if ($_FILES['image_modifié']['size'] != 0) {
        unlink('../uploads/' . $_POST['update'] . '.' . $_POST['extension']);
        checkImageThenUpload($_FILES['image_modifié'], $_POST['numéro_modifié'], $_POST["description_modifié"], $_POST["instruction_modifié"], $_POST["unité_modifié"], $_POST["prix_modifié"]);
    } else {
        $target_file = "../uploads/" . basename($_POST['update'].'.'.$_POST['extension']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $isUploaded=uploadDB($imageFileType, $_POST['numéro_modifié'], $_POST["description_modifié"], $_POST["instruction_modifié"], $_POST["unité_modifié"], $_POST["prix_modifié"]);

        if($isUploaded)
        {

            rename('../uploads/' . $_POST['update'] . '.' . $_POST['extension'],'../uploads/' . $_POST['numéro_modifié'] . '.' . $_POST['extension']);

        }


    }


}


function generateRow()
{
    global $con;
    $req = 'select * from article ';
    $requete = $con->prepare($req);
    $requete->execute();

    $row = $requete->fetch(PDO::FETCH_BOTH);
    $i = 1;
    while ($row) {
        if ($i == 1) {
            ?><div class="section group">
        <?php }

        ?>

        <div class="col span_1_of_3">
            <label>No: </label> <?php echo $row['numero'] ?>
            <figure>
                <img height="150px" class="col span_3_of_3"
                     src="../uploads/<?php echo $row['numero'] . '.' . $row['extension'] ?>">
            </figure>
            <button onclick="dialog(value);"  id="button-<?php echo $row['numero'] ?>" type="button" class="btn btn-info" value="<?php echo $row['numero'] ?>">détail</button>
        </div>
        <div id="<?php echo $row['numero'] ?>" title="détail produit: <?php echo $row['numero'] ?>"
             style="display: none;">
            <img src="../uploads/<?php echo $row['numero'] . '.' . $row['extension'] ?>" width="250px">


            <div class="add">
                <h2 align="center">modifier un produit</h2><br>
                <section id="contact">
                    <form method="post" id="form-<?php echo $row['numero'] ?>" enctype=multipart/form-data>
                        <div class="col-md-6 form-line">
                            <div class="form-group">
                                <label for="numéro">No</label>
                                <input required type="text" class="form-control" id="numéro" name="numéro_modifié"
                                       value="<?php echo $row['numero']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description of Goods</label>
                                <input type="text" class="form-control" id="description" name="description_modifié"
                                       value="<?php echo $row['description']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="image">Picture</label>
                                <input type="file" class="img-control" id="image" accept="image/*" name="image_modifié">
                                <span class="error">
                            </div>
                            <div class="form-group">
                                <label for="instruction">Instruction</label>
                                <textarea name="instruction_modifié" class="form-control" id="instruction" cols="30"
                                          rows="5"
                                          placeholder="ajouter instruction"><?php echo $row['instruction']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="unité">Unit</label>
                                <input type="text" class="form-control" id="unité" name="unité_modifié"
                                       value="<?php echo $row['unite']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="prix">Prix/Pack(DT)</label>
                                <input type="text" class="form-control" id="prix" name="prix_modifié"
                                       value="<?php echo $row['prix']; ?>">
                            </div>

                        </div>
                        <div class="col-md-6">
                        </div>
                        <input hidden type="text" name="extension" value="<?php echo $row['extension'] ?>">
                        <input hidden type="submit" id="update-form-<?php echo $row['numero'] ?>"
                               value="<?php echo $row['numero'] ?>" name="update">
                    </form>
                    <form method="post">
                        <input hidden type="text" name="extension" value="<?php echo $row['extension'] ?>">
                        <input hidden type="submit" id="delete-form-<?php echo $row['numero'] ?>"
                               value="<?php echo $row['numero'] ?>" name="delete">
                    </form>

                </section>
            </div>


        </div>


        <?php
        $row = $requete->fetch(PDO::FETCH_BOTH);
        $i++;
        if ($i == 4) {
            $i = 1; ?>
            </div>
        <?php }

    }


}

