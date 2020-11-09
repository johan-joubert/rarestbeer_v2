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
        <a class="nav-link text-black" href="boutique.php">Boutique</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-black" href="panier.php"><i class="fas fa-shopping-cart"></i> <span id="qtePanier"><?php echo nbrArticles() ?></span></a>
      </li>

    </ul>
  </div>
</nav>

</header> 
</body>
</html>
