<?php
session_start();
include('functions.php');
getConnexion();

if(isset($_SESSION['id'])) {

    $bdd = getConnexion();
    $reqUser = $bdd->prepare("SELECT * FROM clients WHERE id = ?");
    $reqUser->execute(array($_SESSION['id']));
    $user = $reqUser->fetch(PDO::FETCH_ASSOC);

    $reqAdress = $bdd->prepare("SELECT * FROM adresses WHERE id_client = ?");
    $reqAdress->execute(array($_SESSION['id']));
    $adress = $reqAdress->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['newFirstName']) && !empty($_POST['newFirstName']) AND $_POST['newFirstName'] != $user['prenom']) {
        $newFirstName = htmlspecialchars($_POST['newFirstName']);
        $insertFirstName = $bdd->prepare("UPDATE clients SET prenom = ? WHERE id = ?");
        $insertFirstName->execute(array($newFirstName, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newLastName']) && !empty($_POST['newLastName']) AND $_POST['newLastName'] != $user['nom']) {
        $newLastName = htmlspecialchars($_POST['newLastName']);
        $insertLastName = $bdd->prepare("UPDATE clients SET nom = ? WHERE id = ?");
        $insertLastName->execute(array($newLastName, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newEmail']) && !empty($_POST['newEmail']) AND $_POST['newEmail'] != $user['email']) {
        $newEmail = htmlspecialchars($_POST['newEmail']);
        $insertEmail = $bdd->prepare("UPDATE clients SET email = ? WHERE id = ?");
        $insertEmail->execute(array($newEmail, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newMdp']) && !empty($_POST['newMdp']) && $_POST['newMdp'] && isset($_POST['newMdp2']) && !empty($_POST['newMdp2']) && $_POST['newMdp2']  != $user['mot_de_passe']) {

        $mdp1 = $_POST['newMdp'];
        $mdp2 = $_POST['newMdp2'];

        if($mdp1 == $mdp2) {
            $insertMdp = $bdd->prepare("UPDATE clients SET mot_de_passe = ? WHERE id = ?");
            $insertMdp->execute(array(password_hash($mdp1, PASSWORD_DEFAULT), $_SESSION['id']));
            header('Location: profil.php?id='.$_SESSION['id']);    
        }
        else {
            $msg = "Vos deux mots de passe ne correspondent pas !";
        }

    }


    if(isset($_POST['newAdress']) && !empty($_POST['newAdress']) AND $_POST['newAdress'] != $adress['adresse']) {
        $newAdress = htmlspecialchars($_POST['newAdress']);
        $insertAdress = $bdd->prepare("UPDATE adresses SET adresse = ? WHERE id_client = ?");
        $insertAdress->execute(array($newAdress, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }






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
    <!-- <?php include("header.php") ?> -->

        <div class="container">
        
            <div class="row">
            
                <div class="col-md-12">
                    <h1>Edition de mon Profil</h1>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="">
                        <label for="">Prenom</label>
                        <input type="text" name="newFirstName" placeholder="Prénom" value ="<?php echo $user['prenom']; ?>"><br><br>

                        <label for="">Nom</label>
                        <input type="text" name="newLastName" placeholder="Nom" value ="<?php echo $user['nom']; ?>"><br><br>

                        <label for="">Email</label>
                        <input type="email" name="newEmail" placeholder="Email" value ="<?php echo $user['email']; ?>"><br><br>

                        <label for="">Mot de passe</label>
                        <input type="password" name="newMdp" placeholder="Mot de passe"><br><br>

                        <label for="">Confirmer mot de passe</label>
                        <input type="password" name="newMdp2" placeholder="Confirmation mot de passe"><br><br>

                        <label for="">Adresse</label>
                        <input type="text" name="newAdress" placeholder="Adresse" value ="<?php echo $adress['adresse']; ?>"><br><br>

                        <label for="">Code postal</label>
                        <input type="text" name="newCP" placeholder="Code postal" value ="<?php echo $adress['code_postal']; ?>"><br><br>

                        <label for="">Ville</label>
                        <input type="text" name="newCIty" placeholder="Ville" value ="<?php echo $adress['ville']; ?>"><br><br>

                        <input type="submit" name="submitNewProfil" value="mettre à jour mon profil">

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

            <!-- <?php

              if (isset($_SESSION['id']) && $userInfo['id'] == $_SESSION['id']) {
                ?>

                <a href="#">Editer mon profil</a>
                <br>
                <a href="deconnexion.php">Se déconnecter</a>

                <?php
              }  

            ?> -->
        
        </div>



<!--FOOTER-->
    <?php include("footer.php") ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>

<?php

}
else {
    header("Location: connexion.php");
}

?>
