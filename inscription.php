<?php
session_start();
include('functions.php');

getConnexion();

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
        <link rel="stylesheet" href="ressources/css/styles-footer.css">
        <link rel="stylesheet" href="ressources/css/styles-connexion.css">
        <link rel="stylesheet" href="ressources/css/styles-inscription.css">
        <title>Document</title>
    </head>

    <body>

    <!--HEADER-->
        <?php include("header.php") ?>

    <!--MAIN-->

        <div class="container">

            <div class="row">

                <div class="col-md-12">
                <h1 class="text-center">Créer mon compte</h1>
                    <form action="inscription.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Prénom</label>
                            <input type="text" class="form-control" id="inputEmail4" name="firstName" required value= "<?php if(isset($firstName)) { echo $firstName; } ?>">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Nom</label>
                            <input type="text" class="form-control" id="inputPassword4" name="lastName" required value= "<?php if(isset($lastName)) { echo $lastName; } ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="email" required value= "<?php if(isset($email)) { echo $email; } ?>">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Confirmer Email</label>
                            <input type="email" class="form-control" id="inputPassword4" name="email2" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Mot de Passe</label>
                            <input type="password" class="form-control" id="inputEmail4" name="mdp" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Confirmer mot de passe</label>
                            <input type="password" class="form-control" id="inputPassword4" name="mdp2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Addresse</label>
                            <input type="text" class="form-control" id="inputAddress"" name="adress" required value= "<?php if(isset($adress)) { echo $adress; } ?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">Code postale</label>
                            <input type="text" class="form-control" id="inputCity" name="cp" required value= "<?php if(isset($cp)) { echo $cp; } ?>">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputZip">Ville</label>
                            <input type="text" class="form-control" id="inputZip" name="city" required value= "<?php if(isset($ville)) { echo $ville; } ?>">
                            </div>
                        </div>
                        <input type="submit" name="formInscription" class="btn btn-primary" value="Valider">
                    </form>  
                    <?php
                        if(isset($erreur)) {
                            echo $erreur;
                        }
                    ?>

                </div>


            </div>

        </div>


    <!--FOOTER-->
        <?php include("footer.php") ?>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>

</html>