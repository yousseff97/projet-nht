<?php
session_start();
include "IncludeClasses/AutoLoad.php";
include "IncludeClasses/Afficher.php";
include "IncludeClasses/deleteProd.php";

ini_set("display_errors",0);error_reporting(0);


var_dump($_SESSION);

if(isset($_POST["btnUpdateQuantity"]))
{

    $_SESSION['basket'][$_POST["btnUpdateQuantity"]]['quantité']=$_POST['numUpdateQuantity'];
    header("Refresh:0");
}

if(isset($_POST["passerCommande"]))
{
    if ($_SESSION['total']>0){
        header("Location:./IncludeClasses/coor.php");
    }else{
        ?>
        <script>
            alert("Votre panier est vide");
        </script>
<?php
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>panier</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="css/panier.css" rel="stylesheet" type="text/css">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body >
<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Produit</th>
            <th style="width:10%">Prix</th>
            <th style="width:8%">Quantité</th>
            <th style="width:22%" class="text-center">prix total</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $_SESSION['total']=0;
        foreach ( $_SESSION['basket'] as $object ){
            if($object['quantité']>0){

        ?>
        <form method="post">
            <tr>
                <td data-th="Product">
                    <div class="row">

                        <div class="col-sm-10">
                            <h4 class="nomargin"> <?php echo $object['nom']; ?></h4>

                        </div>
                    </div>
                </td>
                <td data-th="Price"><?php echo $object['prix']; ?> DT</td>
                <td data-th="Quantity">

                    <input type="number"  name="numUpdateQuantity" class="form-control text-center" min="1" value="<?php echo preg_replace('/[^0-9]/', '', $object['quantité']); ?>">
                </td>
                <td data-th="Subtotal" class="text-center"><?php echo (preg_replace('/[^0-9]/', '', $object['prix'])*$object['quantité']) ?> DT</td>
                <td class="actions" data-th="">

                    <button class="btn btn-info btn-sm" name="btnUpdateQuantity" value="<?php echo $object['id']; ?>" type="submit"><i class="fa fa-refresh"></i></button>
                    <button class="btn btn-danger btn-sm" name="btnDelete" value="<?php echo $object['id']; ?>" type="submit"><i class="fa fa-trash-o"></i></button>
                </td>
            </tr>
        </form>



        <?php
                $_SESSION['total'] +=(preg_replace('/[^0-9]/', '', $object['prix'])*$object['quantité']);
            }
            else{
                unset($_SESSION['basket'][$object['id']]);

            }
        }
        ?>

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong> <?php echo $_SESSION['total']?> DT</strong></td>
        </tr>
        <tr>
            <td><a href="index.php #produit" class="btn btn-warning" ><i class="fa fa-angle-left"></i> Continuer Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total  <?php echo $_SESSION['total']?> DT</strong></td>
            <form method="post">
             <td><button class="btn btn-success btn-block" type="submit" name="passerCommande">Passer commande <i class="fa fa-angle-right"></i></button></td>
            </form>



        </tr>
        </tfoot>
    </table>
</div>

</body>
</html>