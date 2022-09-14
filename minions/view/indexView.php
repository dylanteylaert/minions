<?php $title = "Accueil" ?>
<?php ob_start(); ?>
<div class="container text-center bin">
    <?php
    if(!empty($_SESSION['username'])){
    ?>
        <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
        <p>découvre nos selections.</p>
        </div>
    <?php } else{ ?>

        
            <h1>Bienvenue</h1>
            <p>Dymroll est un site qui vous permet de découvrir une selection d'animée/dessins animé et une liste d'auteur!</p>
        
    <?php
    }
    ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>