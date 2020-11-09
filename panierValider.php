<?php
session_start();
include('functions.php');

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array ();
}


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


                echo 'montant de frais de port : ' . fdp() . '€';
                echo "<br>";
                echo 'montant de votre commande : ' . montantCommande() . '€ TTC';
                echo "<br>";
                echo 'dont TVA : ' . tva() . '€';
                echo '<br>';



                
            ?>

                        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Valider ma commande
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Votre commande est validée</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                        $date1 = date('Y-m-d'); // Date du jour
                        setlocale(LC_TIME, "fr_FR", "French");
                        echo  'Livraison prévu le : ' .strftime("%A %d %B %G", strtotime($date1. ' + 2 days')); 
                    ?>
                <h4 class="modal-title" id="exampleModalLabel">Merci de votre confiance</h4>
                </div>
                <div class="modal-footer">
                    <form action="index.php" method="post">
                        <input type="submit" name="retourIndex" value="retour à l'accueil">
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>

    </main>





        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>

</html>