<?php
 getConnexion();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles-header.css">
    <title>Document</title>
</head>
<body>
<header >

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <a class="navbar-brand" href="index.php"><img src="ressources/images/logo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-black" href="boutique.php"><span class="ilogo"><i class="fas fa-store-alt"></i></span>BOUTIQUE</a>
      </li>
      <li class="nav-item active">
        <?php 
          if(isset($_SESSION['id'])) {
        ?>
            <a class="nav-link text-black" href="profil.php"><span class="ilogo"><i class="fas fa-user"></i></span></i>MON PROFIL</a>
        <?php
          } else {
        ?>
            <a class="nav-link text-black" href="connexion.php"><span class="ilogo"><i class="fas fa-user"></i></span></i>MON COMPTE</a>
        <?php
          }
        ?>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-black" href="panier.php"><span class="ilogo"><i class="fas fa-shopping-cart"><span id="qtePanier"><?php echo nbrArticles() ?></span></span></i>PANIER</a>
      </li>


    </ul>
  </div>
</nav>

</header> 
</body>
</html>
