<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/styles/style.css">
</head>
<body>
    <header class="bg-dark">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <?php
                if(!empty($_SESSION['username'])){
                ?>
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a type="button" class="cou btn " href="index.php">Accueil</a>
                </li>
                <li class="nav-item active">
                
                    <a type="button" class="cou btn " href="index.php?action=anim"><button type="button" class="btn1">Animé et dessin animé</button></a>
                </li>
                <li class="nav-item">
                    <a type="button" class="cou btn" href="index.php?action=auteur"><button type="button" class="btn1">Auteur</button></a>
                </li>
                <li class="nav-item dropdown">
                    <a type="button" class="cou btn " href="index.php?action=addanim"><button type="button" class="btn2">Ajouter un animé et dessin animé</button></a>
                </li>
                <li class="nav-item">
                    <a type="button" class="cou btn " href="index.php?action=addAuteurs"><button type="button" class="btn2">Ajouter un auteur</button></a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="index.php?search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                </form>
                <a type="button" class="deco btn btn-dark btn-outline-light" href="registration/logout.php">Déconnexion</a>
                 <?php
                    }else{
                ?>
                <a type="button" class="deco btn btn-dark btn-outline-light" href="./registration/login.php">Connexion</a>
                </form>
               <?php
                }
               ?>
            </div>
        </nav>
     
    </header>
    
    <div class="mt-5 ">
  <div class="container ">
    <img class="jumbo" src="public/imgs/header.jpg" width="100%" alt="">
   
  </div>
</div>

<?php echo $content ?>

<!-- Footer -->
<footer class="py-5 mt-5 bg-dark ">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2022 Copyright: Les Minions
  <img src="public/imgs/logo.png" class="logo" alt="" >
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>