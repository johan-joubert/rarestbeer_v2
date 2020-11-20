<?php
session_start();
include('functions.php');

editUser ();

editAdress ();

editPassword ();

//vérifier si panier existe
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array ();
}


if (isset($_POST['IdChooseArticle'])) {
    $id = $_POST['IdChooseArticle'];
    $chooseArticle = getOneArticleFromId($id);
    ajoutAuPanier($chooseArticle, $id);
}

if (isset($_POST['retourIndex'])){
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
    <title>Document</title>
</head>

<body>

<!--HEADER-->
    <?php include("header.php") ?>

        <div class="container">
        
            <div class="row">
            
                <div class="col-md-12">
                    <h1>Edition de mon Profil</h1>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="editionProfile.php">
                        <table>
                            <tr>
                                <td>
                                    <label for="">Prenom</label>
                                </td>
                                <td>
                                    <input type="text" name="newFirstName" placeholder="Prénom" value ="<?php echo $_SESSION['prenom']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Nom</label>
                                </td>
                                <td>
                                    <input type="text" name="newLastName" placeholder="Nom" value ="<?php echo $_SESSION['nom']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Email</label>
                                </td>
                                <td>
                                    <input type="email" name="newEmail" placeholder="Email" value ="<?php echo $_SESSION['email']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submitNewProfil" value="mettre à jour mon profil" >
                                </td>
                            </tr>
                        </table>

                    </form>

                    <form method="POST" action="editionProfile.php">

                        <table>
                            <tr>
                                <td>
                                    <label for="">Adresse</label>
                                </td>
                                <td>
                                    <input type="text" name="newAdress" placeholder="Adresse" value ="<?php echo $_SESSION['adresse']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Code postal</label>
                                </td>
                                <td>
                                    <input type="text" name="newCP" placeholder="Code postal" value ="<?php echo $_SESSION['code_postal']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Ville</label>
                                </td>
                                <td>
                                    <input type="text" name="newCity" placeholder="Ville" value ="<?php echo $_SESSION['ville']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submitNewAdress" value="mettre à jour mon adresse"><br><br>
                                </td>
                            </tr>
                        </table>

                    </form>

                    <form method="POST" action="editionProfile.php">
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
                    </form>

                        <?php 

                            if(isset($msg)) {
                                echo $msg;
                            }

                        ?>

                    </form>
                </div>

                <div class="col-md-12">
                </div>

                <div class="col-md-12">
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

<?php


?>
