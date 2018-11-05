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
    $sql = 'DELETE FROM `service` WHERE `numero`=:numero';
    $requete = $con->prepare($sql);
    $requete->execute([':numero' => $numero]);


}

function checkValidity($numero,$oldnumero)
{
    if($numero!=$oldnumero){
        global $con;
        $sql = 'select numero  FROM `service` WHERE `numero`=:numero';
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

}


if (isset($_POST['update'])) {

    checkValidity($_POST['numero1'],$_POST['update']);
    deleteDB($_POST['update']);
    uploadDB($_POST['numero1'],$_POST['name1'],$_POST['description1'] );



}


function generateRow()
{
    global $con;
    $req = 'select * from service ';
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

            <button onclick="dialog(value);"  id="button-<?php echo $row['numero'] ?>" type="button" class="btn btn-info" value="<?php echo $row['numero'] ?>">détail</button>
        </div>
        <div id="<?php echo $row['numero'] ?>" title="détail service: <?php echo $row['numero'] ?>"
             style="display: none;">


            <div class="add">
                <h2 align="center">modifier un service</h2><br>
                <section id="contact">
                    <form  method="post" id="form-<?php echo $row['numero'] ?>" >
                        <div class="col-md-6 form-line">
                            <div class="form-group">
                                <label for="numero1">No</label>
                                <input type="text"class="form-control" id="numero1" name="numero1" value="<?php echo $row['numero']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="name1">name</label>
                                <input type="text"  class="form-control" id="name1" name="name1" value="<?php echo $row['nom']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="description1">Description of service</label>
                                <input type="text"  class="form-control" id="description1" name="description1" value="<?php echo $row['description']; ?>">
                            </div>
                            <div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <input hidden type="submit" id="update-form-<?php echo $row['numero'] ?>"
                               value="<?php echo $row['numero'] ?>" name="update">
                    </form>
                    <form method="post">
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