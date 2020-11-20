<?php
session_start();
include('functions.php');

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

if (isset($_POST['idQteArticle'])) {
    modifierQtePanier();
    // modifierPrixUnitraire ();
}


if (isset($_POST['deleteArticle'])) {
    supprimerArticle($_POST['deleteArticle']);
    echo "<script> alert(\"Article retiré du panier\");</script>";
}


if (isset($_POST['unsetSession'])) {
    $_SESSION['panier'] = array();
}

if (!isset($_SESSION['panier'])) {
    montant_panier();
}

livraison();


editUser ();

editAdress ();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--link bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--link fontawesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--link google font-->
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700&family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--LINK CSS-->
    <link rel="stylesheet" href="ressources/css/styles-header.css">
    <link rel="stylesheet" href="ressources/css/styles-index.css">
    <link rel="stylesheet" href="ressources/css/styles-functions.css">
    <link rel="stylesheet" href="ressources/css/styles-panier.css">
    <link rel="stylesheet" href="ressources/css/styles-panierValider.css">
    <title>Document</title>
</head>

<body>

    <?php
    include("header.php")
    ?>
    <div class="container">

        <?php

        $monPanier = $_SESSION['panier'];
        showPanier($monPanier);
        echo "<div class=\"totalMontant\">Total de votre panier : " . sprintf('%.2f', montant_panier())  . " € </div>";
        ?>


        <div class="row">
            <div class="col-md-6">

                <form action="panierValider.php" method="post" class="formLivraison">
                    <h5>Choisissez votre mode de livraison</h5>
                    <table>
                        <tr>
                            <td>
                                <input type="checkbox" id="chronopost" name="chronopost">
                            </td>
                            <td>
                                <label for="scales">Chronopost</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="pigeon" name="pigeon">
                            </td>
                            <td>
                                <label for="scales">Pigeon voyageur</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Valider" name="submitLivraison" id="submitLivraison" class="btnLivraison">
                            </td>
                        </tr>

                    </table>
                </form>

                <div class="container-montant">
            <form action="panierValider.php" method="post">
                <input type="text" id="codePromo" name="codePromo" placeholder="code de réduction">
                <input type="submit" class="btnPromo">
            </form>
            <?php
            if (isset($_SESSION['livraison'])) {
                echo showPromo() .
                    "Montant frais de port : "
                    . fdp() . " €
                <br>
                <div id=\"montant\">Total de votre commande <br>" . sprintf('%.2f', (montantCommande())) . " €</div>
                <br>
                dont TVA :"
                    . tva() . "€
                <br>
                <input type=\"submit\" value=\"VALIDER MA COMMANDE\" name=\"validateOrdered\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#exampleModal\">";
                $nouveauMontant = sprintf('%.2f', (montantCommande()));
            }
            ?>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <?php

                        echo "<h4 class=\"modal-title\" id=\"exampleModalLabel\">Votre commande d'un total de : <br> " . $nouveauMontant .  "€ <br> est validée</h4>";

                        ?>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $date1 = date('Y-m-d'); // Date du jour
                        setlocale(LC_TIME, "fr_FR", "French");
                        echo  'Livraison prévu le : ' . strftime("%A %d %B %G", strtotime($date1 . ' + 2 days'));
                        ?>
                        <h4 class="modal-title" id="exampleModalLabel">Merci de votre confiance</h4>
                    </div>
                    <div class="modal-footer">
                        <form action="index.php" method="post">
                            <input type="submit" name="validateOrdered" value="retour à l'accueil">
                        </form>
                    </div>
                </div>
            </div>
        </div>


            </div>
            <div class="col-md-6">

                <h5>Vos coordonnées de livraison</h5>

                <form method="post" action="panierValider.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Prénom</label>
                            <input type="text" name="newFirstName" class="form-control" id="inputEmail4" value ="<?php echo $_SESSION['prenom']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Nom</label>
                            <input type="text" name="newLastName" class="form-control" id="inputPassword4" value ="<?php echo $_SESSION['nom']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Email</label>
                        <input type="email" name="newEmail" class="form-control" id="inputAddress" value ="<?php echo $_SESSION['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Adresse</label>
                        <input type="text" name="newAdress" class="form-control" id="inputAddress2" value ="<?php echo $_SESSION['adresse']; ?>">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Ville</label>
                            <input type="text" name="newCity" class="form-control" id="inputCity" value ="<?php echo $_SESSION['ville']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Code postal</label>
                            <input type="text" name="newCP" class="form-control" id="inputZip" value ="<?php echo $_SESSION['code_postal']; ?>">
                        </div>
                    </div>
                    <input type="submit" name="submitNewAdressOrder" class="btn btn-light" value="Modifier mon adresse de livraison">
                </form>
            </div>

        </div>



    </div>

    </main>

    <?php include("footer.php") ?>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>