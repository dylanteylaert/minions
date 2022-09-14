<?php $title = "Accueil" ?>
<?php ob_start(); ?>

<div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p>C'est votre tableau de bord.</p>
    <a href="logout.php">Déconnexion</a>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>