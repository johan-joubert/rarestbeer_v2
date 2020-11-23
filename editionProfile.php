<?php
session_start();
include('functions.php');

editUser();

editAdress();

editPassword();

//vérifier si panier existe
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}


if (isset($_POST['IdChooseArticle'])) {
    $id = $_POST['IdChooseArticle'];
    $chooseArticle = getOneArticleFromId($id);
    ajoutAuPanier($chooseArticle, $id);
}

if (isset($_POST['retourIndex'])) {
    $_SESSION['panier'] = array();
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
    <link rel="stylesheet" href="ressources/css/styles-footer.css">
    <link rel="stylesheet" href="ressources/css/styles-profile.css">
    <link rel="stylesheet" href="ressources/css/styles-editionProfil.css">
    <title>Document</title>
</head>

<body>

    <!--HEADER-->
    <?php include("header.php") ?>

    <div class="container">

        <h2 class="text-center">Mes informations personnelles</h2>

        <div class="row">

            <form method="post" action="editionProfile.php">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="blocInfos">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Prénom</label>
                                        <input type="text" name="newFirstName" class="form-control" id="inputEmail4" value="<?php echo $_SESSION['prenom']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Nom</label>
                                        <input type="text" name="newLastName" class="form-control" id="inputPassword4" value="<?php echo $_SESSION['nom']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Email</label>
                                    <input type="email" name="newEmail" class="form-control" id="inputAddress" value="<?php echo $_SESSION['email']; ?>">
                                </div>
                                <input type="submit" name="submitNewProfil" class="btnSaveInfo" value="Modifier mes informations">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="blocInfos">
                                <div class="form-group">
                                    <label for="inputAddress2">Adresse</label>
                                    <input type="text" name="newAdress" class="form-control" id="inputAddress2" value="<?php echo $_SESSION['adresse']; ?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Ville</label>
                                        <input type="text" name="newCity" class="form-control" id="inputCity" value="<?php echo $_SESSION['ville']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Code postal</label>
                                        <input type="text" name="newCP" class="form-control" id="inputZip" value="<?php echo $_SESSION['code_postal']; ?>">
                                    </div>
                                </div>
                                <input type="submit" name="submitNewAdress" class="btnSaveInfo" value="Modifier mon adresse de livraison">
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <?php

            if (isset($msg)) {
                echo $msg;
            }

            ?>

        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
            Modifer mon mot de passe
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="editionProfile.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ancien mot de passe</label>
                                <input type="password" name="oldPassword" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre ancien mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nouveau mot de passe</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="newPassword" placeholder="Nouveau mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirmer mot de passe</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="confirmNewPassword" placeholder="Confirmer nouveau mot de passe">
                            </div>
                            <input type="submit" class="btn btn-primary" name="submitNewPassword" value="mettre à jour mon mot de passe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

     <!-- <form method="POST" action="editionProfile.php">
                        <table>
                            <tr>
                                <td>
                                    <input type="password" name="oldPassword" placeholder="Votre ancien mot de passe">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" name="newPassword" placeholder="Nouveau mot de passe">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" name="confirmNewPassword" placeholder="Confirmer nouveau mot de passe">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submitNewPassword" value="mettre à jour mon mot de passe">
                                </td>
                            </tr>

                        </table> 
                    </form> -->





    <!--FOOTER-->
    <?php include("footer.php") ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>

<?php


?>