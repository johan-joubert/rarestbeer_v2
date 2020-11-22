<?php
session_start();
include('functions.php');

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
        <link rel="stylesheet" href="ressources/css/styles-connectAdmin.css">
        <title>Document</title>
    </head>

    <body>

    <?php include("header.php") ?>


        <div class="container">

            <div class="row">

                <form method="post" action="admin.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Identifiant</label>
                        <input type="text" name="idAdmin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">mot de passe</label>
                        <input type="password" name="passwordAdmin" class="form-control" id="exampleInputPassword1">
                    </div>
                    <input type="submit" name="submitConnectAdmin" class="btn btn-primary" value="Se connecter">
                </form>

            </div>

        </div>
    <?php include("footer.php") ?>

    </body>

</html>


